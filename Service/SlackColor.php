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

use WowApps\SlackBundle\Exception\SlackbotException;

/**
 * Class SlackColor.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackColor
{
    const COLOR_DEFAULT = 'default';
    const COLOR_DANGER = 'danger';
    const COLOR_SUCCESS = 'success';
    const COLOR_WARNING = 'warning';
    const COLOR_INFO = 'info';

    const COLOR_MAP = [
        self::COLOR_DEFAULT,
        self::COLOR_DANGER,
        self::COLOR_SUCCESS,
        self::COLOR_WARNING,
        self::COLOR_INFO,
    ];

    /** @var array */
    private $colorHexCodes = [
        self::COLOR_DEFAULT => '',
        self::COLOR_DANGER => '',
        self::COLOR_SUCCESS => '',
        self::COLOR_WARNING => '',
        self::COLOR_INFO => '',
    ];

    /**
     * SlackColor constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        foreach (self::COLOR_MAP as $colorName) {
            $this->colorHexCodes[$colorName] = !empty($config['colors'][$colorName])
                ? $config['colors'][$colorName] : '';
        }
    }

    /**
     * @param string $color
     *
     * @return string
     */
    public function getHex(string $color): string
    {
        if (!in_array($color, self::COLOR_MAP)) {
            throw new SlackbotException(SlackbotException::E_INCORRECT_COLOR);
        }

        return $this->colorHexCodes[$color];
    }
}
