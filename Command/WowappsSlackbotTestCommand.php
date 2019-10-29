<?php

/*
 * This file is part of the WoW-Apps/Symfony-Slack-Bot bundle for Symfony.
 * https://github.com/wow-apps/symfony-slack-bot
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * https://github.com/wow-apps/symfony-slack-bot/blob/master/LICENSE
 *
 * For technical documentation.
 * https://wow-apps.github.io/symfony-slack-bot/docs/
 *
 * Author Alexey Samara <lion.samara@gmail.com>
 *
 * Copyright 2016 WoW-Apps.
 */

namespace WowApps\SlackBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use WowApps\SlackBundle\Entity\Attachment;
use WowApps\SlackBundle\Entity\AttachmentAction;
use WowApps\SlackBundle\Entity\AttachmentActionConfirm;
use WowApps\SlackBundle\Entity\AttachmentField;
use WowApps\SlackBundle\Entity\SlackMessage;
use WowApps\SlackBundle\Exception\SlackbotException;
use WowApps\SlackBundle\Service\SlackBot;
use WowApps\SlackBundle\Service\SlackColor;
use WowApps\SlackBundle\Service\SlackEmoji;
use WowApps\SlackBundle\Service\SlackMarkdown;
use WowApps\SlackBundle\Templating\Template\SlackException;
use WowApps\SlackBundle\WowAppsSlackBundle;

/**
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class WowappsSlackbotTestCommand extends ContainerAwareCommand
{
    const COMMAND_NAME = 'wowapps:slackbot:test';

    const M_SENDING_SKIPPED = 'Sending test message skipped';
    const M_NOT_SENT = 'Message not sent';
    const M_SENT = 'Test message sent successfully';

    /** @var SlackBot */
    private $slackBot;

    /** @var array */
    private $config;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription('Test your settings and try to send message')
            ->addOption('include-exception', null, InputOption::VALUE_NONE, 'Send template exception')
            ->addOption('skip-sending', null, InputOption::VALUE_NONE, 'Skip sending test message and test exception');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* Work with container for support of Symfony 3 early versions */
        $this->slackBot = $this->getContainer()->get('wowapps.slackbot');
        $this->config = $this->slackBot->getConfig();

        $this->drawHeader($output);

        $symfonyStyle = new SymfonyStyle($input, $output);
        $this->drawConfig($symfonyStyle);

        if ($input->getOption('skip-sending')) {
            $symfonyStyle->note(self::M_SENDING_SKIPPED);

            return;
        }

        if (!$this->sendTestMessage()) {
            $symfonyStyle->error(self::M_NOT_SENT);

            return;
        }

        $symfonyStyle->success(self::M_SENT);

        if ($input->getOption('include-exception')) {
            try {
                throw new SlackbotException(SlackbotException::E_CONVERT_MESSAGE_TO_JSON);
            } catch (SlackbotException $exception) {
                if (!$this->slackBot->sendTemplate(new SlackException($exception))) {
                    $symfonyStyle->error('Template exception not sent');

                    return;
                }

                $symfonyStyle->success('Template message sent successfully');
            }
        }
    }

    /**
     * @param OutputInterface $output
     */
    private function drawHeader(OutputInterface $output)
    {
        $output->writeln([
            PHP_EOL,
            '<bg=black;options=bold;fg=white>                                                       </>',
            '<bg=black;options=bold;fg=white>           S Y M F O N Y   S L A C K   B O T           </>',
            sprintf(
                '<bg=black;fg=white>                     version %s                     </>',
                WowAppsSlackBundle::CURRENT_VERSION
            ),
        ]);
    }

    /**
     * @param SymfonyStyle $symfonyStyle
     */
    private function drawConfig(SymfonyStyle $symfonyStyle)
    {
        $symfonyStyle->section('SlackBot configuration');

        $tBody = [
            ['Slack API url', $this->config['api_url']],
            ['Default icon url', $this->config['default_icon_url']],
            ['Default bot\'s name', $this->config['default_username']],
            ['Colors:', ''],
            ['   default', $this->config['colors']['default']],
            ['   info', $this->config['colors']['info']],
            ['   warning', $this->config['colors']['warning']],
            ['   success', $this->config['colors']['success']],
            ['   danger', $this->config['colors']['danger']],
            ['Templates configuration:', ''],
        ];

        foreach ($this->config['templates'] as $templateName => $templateConfig) {
            $tBody[] = ['   ' . $templateName . ':', ''];
            foreach ($templateConfig as $key => $value) {
                $tBody[] = ['      ' . $key, $value];
            }
        }

        $symfonyStyle->table(['Parameter', 'Value'], $tBody);
    }

    /**
     * @return bool
     */
    private function sendTestMessage()
    {
        $slackMessage = new SlackMessage(
            'Simple Symfony 3 and 4 Bundle for sending customizable messages to Slack via '
            . SlackMarkdown::link('incoming webhooks', 'https://api.slack.com/incoming-webhooks')
        );

        $attachment = new Attachment();
        $attachment
            ->setColor(SlackColor::COLOR_DEFAULT)
            ->setAuthorName('WoW-Apps')
            ->setAuthorLink('https://wow-apps.pro/')
            ->setAuthorIconUrl('https://wow-apps.pro/img/favicon.png')
            ->setTitle('Symfony Slack Bot')
            ->setTitleLink('https://github.com/wow-apps/symfony-slack-bot')
            ->setText(
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut '
                    . 'labore et dolore magna aliqua. Morbi non arcu risus quis. At ultrices mi tempus imperdiet. '
                    . 'Suspendisse in est ante in nibh mauris cursus mattis molestie.'
            )
            ->setFooter('Alexey Samara')
            ->setFooterIconUrl('https://avatars2.githubusercontent.com/u/2779949?s=460&v=4')
            ->setTimestamp(time());

        $slackMessage->appendAttachment($attachment);

        $attachment = new Attachment();
        $attachment
            ->setColor(SlackColor::COLOR_INFO)
            ->appendField(new AttachmentField('Version:', WowAppsSlackBundle::CURRENT_VERSION, true))
            ->appendField(new AttachmentField('Build status:', 'passed', true))
            ->appendField(
                new AttachmentField(
                    'Run in terminal to install:',
                    SlackMarkdown::code(['composer require wow-apps/symfony-slack-bot']),
                    false
                )
            )
            ->appendAction(
                new AttachmentAction(
                    SlackEmoji::PEOPLE__FEMALE_TECHNOLOGIST . ' View documentation',
                    'https://wow-apps.github.io/symfony-slack-bot/docs'
                )
            )
            ->appendAction(
                new AttachmentAction(
                    SlackEmoji::PEOPLE__SMILEY_CAT . ' View source on GitHub',
                    'https://github.com/wow-apps/symfony-slack-bot'
                )
            )
            ->appendAction(
                new AttachmentAction(
                    SlackEmoji::PEOPLE__GHOST . ' Button with confirmation',
                    'https://cdn.shopify.com/s/files/1/1034/8911/products/'
                    . 's_8422_9TLbAj9PUhSRVCVAKCz7sHZcVYdpGyBlack.png?v=1473238696',
                    AttachmentAction::STYLE_PRIMARY,
                    new AttachmentActionConfirm(
                        true,
                        'Open funny image',
                        'Are you sure, you want to continue?',
                        'I\'m sure',
                        'No, turn me back'
                    )
                )
            );

        $slackMessage->appendAttachment($attachment);

        return $this->slackBot->send($slackMessage);
    }
}
