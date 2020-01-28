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
 * Copyright 2016 - 2020 WoW-Apps.
 */

namespace WowApps\SlackBundle\Entity;

class Workspace
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string|null
     */
    private $defaultIcon;

    /**
     * @var string|null
     */
    private $defaultUser;

    /**
     * Workspace constructor.
     *
     * @param string      $url
     * @param string|null $defaultIcon
     * @param string|null $defaultUser
     */
    public function __construct(string $url, string $defaultIcon = null, string $defaultUser = null)
    {
        $this->url = $url;
        $this->defaultIcon = empty($defaultIcon) ? null : $defaultIcon;
        $this->defaultUser = empty($defaultUser) ? null : $defaultUser;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function getDefaultIcon()
    {
        return $this->defaultIcon;
    }

    /**
     * @return string|null
     */
    public function getDefaultUser()
    {
        return $this->defaultUser;
    }
}
