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

namespace WowApps\SlackBundle\Service;

use WowApps\SlackBundle\Entity\SlackMessage;
use WowApps\SlackBundle\Templating\SlackTemplateInterface;

class SlackTemplatingManager
{
    /** @var array */
    private $config;

    /** @var SlackTemplateInterface */
    private $template;

    /**
     * SlackTemplatingManager constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param SlackTemplateInterface $template
     *
     * @return SlackTemplatingManager
     */
    public function setTemplate(SlackTemplateInterface $template): SlackTemplatingManager
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return SlackMessage
     */
    public function getMessage(): SlackMessage
    {
        return $this->getMessageWithDefaults();
    }

    /**
     * @return SlackMessage
     */
    private function getMessageWithDefaults(): SlackMessage
    {
        $message = $this->template->getMessage();

        if (empty($message->getUsername())
            && !empty($this->config['templates'][$this->template->getConfigIndex()]['username'])
        ) {
            $message->setUsername($this->config['templates'][$this->template->getConfigIndex()]['username']);
        }

        if (empty($message->getChannel())
            && !empty($this->config['templates'][$this->template->getConfigIndex()]['channel'])
        ) {
            $message->setChannel($this->config['templates'][$this->template->getConfigIndex()]['channel']);
        }

        if (empty($message->getIconUrl())
            && !empty($this->config['templates'][$this->template->getConfigIndex()]['icon'])
        ) {
            $message->setIconUrl($this->config['templates'][$this->template->getConfigIndex()]['icon']);
        }

        return $message;
    }
}
