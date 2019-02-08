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

namespace WowApps\SlackBundle\Tests\Service;

use WowApps\SlackBundle\Exception\SlackbotException;
use WowApps\SlackBundle\Service\SlackColor;
use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class SlackColorTest.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackColorTest extends TestCase
{
    public function testGetHex()
    {
        $config['colors'] = [
            'default' => $this->randomString(),
            'danger' => $this->randomString(),
            'success' => $this->randomString(),
            'warning' => $this->randomString(),
            'info' => $this->randomString(),
        ];

        $slackColorMock = new SlackColor($config);

        foreach (SlackColor::COLOR_MAP as $color) {
            $this->assertTrue(is_string($slackColorMock->getHex($color)));
            $this->assertSame($config['colors'][$color], $slackColorMock->getHex($color));
        }

        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_INCORRECT_COLOR);
        $slackColorMock->getHex($this->randomString());
    }
}
