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

/**
 * Class SlackBot.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackBot
{
    /** @var SlackMessageBuilder */
    private $builder;

    /** @var SlackProvider */
    private $provider;

    /** @var SlackTemplatingManager */
    private $templatingManager;

    /** @var array */
    private $config;

    /**
     * SlackBot constructor.
     *
     * @param array                  $config
     * @param SlackMessageBuilder    $builder
     * @param SlackProvider          $provider
     * @param SlackTemplatingManager $templatingManager
     */
    public function __construct(
        array $config,
        SlackMessageBuilder $builder,
        SlackProvider $provider,
        SlackTemplatingManager $templatingManager
    ) {
        $this->config = $config;
        $this->builder = $builder;
        $this->provider = $provider;
        $this->templatingManager = $templatingManager;
    }

    /**
     * @param SlackMessage $slackMessage
     *
     * @return bool
     */
    public function send(SlackMessage $slackMessage): bool
    {
        return $this->provider->send(
            $this->builder->buildRequestBody($slackMessage)
        );
    }

    /**
     * @param SlackTemplateInterface $slackTemplate
     *
     * @return bool
     */
    public function sendTemplate(SlackTemplateInterface $slackTemplate): bool
    {
        return $this->send(
            $this->templatingManager->setTemplate($slackTemplate)->getMessage()
        );
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }
}
