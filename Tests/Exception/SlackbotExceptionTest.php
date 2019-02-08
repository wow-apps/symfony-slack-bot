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

namespace WowApps\SlackBundle\Tests\Exception;

use WowApps\SlackBundle\Exception\SlackbotException;
use WowApps\SlackBundle\Tests\TestCase;

class SlackbotExceptionTest extends TestCase
{
    public function testExceptionMessage()
    {
        try {
            throw new SlackbotException(SlackbotException::E_UNKNOWN);
        } catch (SlackbotException $exception) {
            $this->assertContains('Unknown error', $exception->getMessage());
        }
    }
}
