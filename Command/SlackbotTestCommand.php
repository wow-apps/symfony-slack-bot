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
use WowApps\SlackBundle\Traits\SlackMessageTrait;

/**
 * Class SlackbotTestCommand
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 */
class SlackbotTestCommand extends ContainerAwareCommand
{
    use SlackMessageTrait;

    protected function configure()
    {
        $this
            ->setName('wowapps:slackbot:test')
            ->setDescription('Test your settings and try to send messages')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var SlackBot $slackBot */
        $slackBot = $this->getContainer()->get('wowapps.slackbot');
        $slackBotConfig = $slackBot->getConfig();

        $symfonyStyle = new SymfonyStyle($input, $output);

        echo PHP_EOL;
        $output->writeln('<bg=blue;options=bold;fg=white>                                               </>');
        $output->writeln('<bg=blue;options=bold;fg=white>           S L A C K B O T   T E S T           </>');
        $output->writeln('<bg=blue;options=bold;fg=white>                                               </>');
        echo PHP_EOL;

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

        $symfonyStyle->section('Sending short message...');

        if ($this->sendTestMessage($slackBot)) {
            $symfonyStyle->success('Message sent successfully');
        } else {
            $symfonyStyle->error('Message not sent');
        }
    }

    /**
     * @param SlackBot $slackBot
     * @return bool
     */
    private function sendTestMessage(SlackBot $slackBot)
    {
        $slackMessage = new SlackMessage();

        $quoteText = [
            'This is ' . $this->formatBold('test') . ' message sent by SlackBot',
            $this->formatCode([
                '<?php',
                '$someString = \'Hello world!\';',
                'echo $someString;'
            ])
        ];

        $slackMessage
            ->setIcon('http://cdn.wow-apps.pro/slackbot/slack-bot-icon-48.png')
            ->setText('If you read this - SlackBot is working!')
            ->setRecipient('general')
            ->setSender('WoW-Apps')
            ->setShowQuote(true)
            ->setQuoteType(SlackBot::QUOTE_SUCCESS)
            ->setQuoteText($this->inlineMultilines($quoteText))
            ->setQuoteTitle('SlackBot for Symfony 3')
            ->setQuoteTitleLink('https://github.com/wow-apps/symfony-slack-bot')
        ;

        return $slackBot->sendMessage($slackMessage);
    }
}
