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

namespace WowApps\SlackBundle\Service;

use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class SlackEmojiTest
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 */
class SlackEmojiTest extends TestCase
{
    const EMOJI_FORMAT_PATTERN = '/^\:[a-zA-Z\-\_\d]+\:$/i';

    public function testEmojiFormat()
    {
        $reflectionClass = new \ReflectionClass(SlackEmoji::class);
        $emojies = array_values($reflectionClass->getConstants());
        foreach ($emojies as $emoji) {
            $this->assertInternalType('string', $emoji);
            $this->assertRegExp(self::EMOJI_FORMAT_PATTERN, $emoji);
        }
    }
}
