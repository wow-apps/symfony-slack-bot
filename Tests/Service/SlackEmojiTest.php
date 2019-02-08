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

use WowApps\SlackBundle\Service\SlackEmoji;
use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class SlackEmojiTest.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackEmojiTest extends TestCase
{
    const EMOJI_FORMAT_PATTERN = '/^\:[a-zA-Z\-\_\d]+\:$/i';
    const EMOJI_CONST_PATTERN = '/^(.*?)\_\_(.*)/i';
    const EMOJI_ALLOWED_GROUPS = ['PEOPLE', 'NATURE', 'FOOD', 'ACTIVITY', 'TRAVEL', 'OBJECTS', 'SYMBOLS', 'FLAGS'];

    /**
     * @throws \ReflectionException
     */
    public function testEmojiFormat()
    {
        $reflectionClass = new \ReflectionClass(SlackEmoji::class);
        $emojies = $reflectionClass->getConstants();
        foreach ($emojies as $emojiConst => $emoji) {
            preg_match(self::EMOJI_CONST_PATTERN, $emojiConst, $emojiConstMatch);
            $this->assertCount(3, $emojiConstMatch);
            $this->assertTrue(in_array($emojiConstMatch[1], self::EMOJI_ALLOWED_GROUPS));
            $this->assertSame(strtoupper(str_replace('-', '_', str_replace(':', '', $emoji))), $emojiConstMatch[2]);
            $this->assertSame(strtolower($emoji), $emoji);
            $this->assertTrue(is_string($emoji));
            $this->assertRegExp(self::EMOJI_FORMAT_PATTERN, $emoji);
        }
    }
}
