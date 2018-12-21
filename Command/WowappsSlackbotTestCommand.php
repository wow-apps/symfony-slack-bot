<?php
/**
 * This file is part of the WoW-Apps/Symfony-Slack-Bot bundle for Symfony 3
 * https://github.com/wow-apps/symfony-slack-bot
 *
 * (c) 2016 WoW-Apps
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WowApps\SlackBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use WowApps\SlackBundle\DTO\SlackMessage;
use WowApps\SlackBundle\Service\SlackBot;
use WowApps\SlackBundle\Service\SlackEmoji;
use WowApps\SlackBundle\Traits\SlackMessageTrait;

/**
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 * @see https://github.com/wow-apps/symfony-slack-bot/wiki/1.-Installation#send-test-message
 */
class WowappsSlackbotTestCommand extends ContainerAwareCommand
{
    use SlackMessageTrait;

    /** @var SlackBot */
    private $slackBot;

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this
            ->setName('wowapps:slackbot:test')
            ->setDescription('Test your settings and try to send messages');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** Dirty hack for support in Symfony before version 3.4 */
        $this->slackBot = $this->getContainer()->get('wowapps.slackbot');

        $this->drawHeader($output);

        $symfonyStyle = new SymfonyStyle($input, $output);
        $this->drawConfig($symfonyStyle, $this->slackBot->getConfig());

        $symfonyStyle->section('Sending short message...');

        if (!$this->sendTestMessage()) {
            $symfonyStyle->error('Message not sent');
            return;
        }

        $symfonyStyle->success('Message sent successfully');
    }

    /**
     * @param OutputInterface $output
     */
    private function drawHeader(OutputInterface $output)
    {
        echo PHP_EOL;
        $output->writeln('<bg=blue;options=bold;fg=white>                                               </>');
        $output->writeln('<bg=blue;options=bold;fg=white>           S L A C K B O T   T E S T           </>');
        $output->writeln('<bg=blue;options=bold;fg=white>                                               </>');
        echo PHP_EOL;
    }

    /**
     * @param SymfonyStyle $symfonyStyle
     * @param array $slackBotConfig
     */
    private function drawConfig(SymfonyStyle $symfonyStyle, array $slackBotConfig)
    {
        $symfonyStyle->section('SlackBot general settings');

        $symfonyStyle->table(
            ['api url'],
            [[$slackBotConfig['api_url']]]
        );

        $symfonyStyle->table(
            ['default icon'],
            [[$slackBotConfig['default_icon']]]
        );

        $symfonyStyle->table(
            ['default recipient'],
            [[$slackBotConfig['default_channel']]]
        );

        $symfonyStyle->section('SlackBot quote colors');

        $symfonyStyle->table(
            ['default', 'info', 'warning', 'success', 'danger'],
            [
                [
                    $slackBotConfig['quote_color']['default'],
                    $slackBotConfig['quote_color']['info'],
                    $slackBotConfig['quote_color']['warning'],
                    $slackBotConfig['quote_color']['success'],
                    $slackBotConfig['quote_color']['danger']
                ]
            ]
        );
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    private function sendTestMessage()
    {
        $slackMessage = new SlackMessage();

        $quoteText = [
            sprintf('This is %s message sent by SlackBot', $this->formatBold('test')),
            $this->formatCode([
                '<?php',
                '$someString = \'Hello world!\';',
                'echo $someString;'
            ])
        ];

        $reflectionClass = new \ReflectionClass(SlackEmoji::class);
        $iconsArray = array_values($reflectionClass->getConstants());
        $randomIcon = $iconsArray[rand(0, (count($iconsArray) - 1))];

        $slackMessage
            ->setIconEmoji($randomIcon)
            ->setText('If you read this - SlackBot is working!')
            ->setRecipient('general')
            ->setSender('WoW-Apps')
            ->setShowQuote(true)
            ->setQuoteType(SlackBot::QUOTE_SUCCESS)
            ->setQuoteText($this->inlineMultilines($quoteText))
            ->setQuoteTitle('SlackBot for Symfony')
            ->setQuoteTitleLink('https://github.com/wow-apps/symfony-slack-bot')
        ;

        return $this->slackBot->sendMessage($slackMessage);
    }
}
