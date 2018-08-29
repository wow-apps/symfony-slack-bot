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

namespace WowApps\SlackBundle\Tests\Traits;

use WowApps\SlackBundle\Tests\TestCase;
use WowApps\SlackBundle\Traits\SlackMessageTrait;

/**
 * Trait SlackMessageTrait Test
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 */
class SlackMessageTraitTest extends TestCase
{
    use SlackMessageTrait;

    public function testInlineMultilines()
    {
        $lines = [];
        for ($i = rand(parent::ARRAY_MIN_ITEMS, parent::ARRAY_MAX_ITEMS); $i <= parent::ARRAY_MAX_ITEMS; ++$i) {
            $randomString = $this->randomString();
            $lines[] = $randomString;
        }

        $expect = implode("\n", $lines);
        $actual = $this->inlineMultilines($lines);

        $this->assertEquals($expect, $actual);
    }

    public function testFormatBold()
    {
        $randomString = $this->randomString();
        $expect = sprintf('*%s*', $randomString);
        $actual = $this->formatBold($randomString);

        $this->assertEquals($expect, $actual);
    }

    public function testFormatItalic()
    {
        $randomString = $this->randomString();
        $expect = sprintf('_%s_', $randomString);
        $actual = $this->formatItalic($randomString);

        $this->assertEquals($expect, $actual);
    }

    public function testFormatStrikeThought()
    {
        $randomString = $this->randomString();
        $expect = sprintf('~%s~', $randomString);
        $actual = $this->formatStrikeThought($randomString);

        $this->assertEquals($expect, $actual);
    }

    public function testFormatListMarker()
    {
        $lines = [];
        for ($i = rand(parent::ARRAY_MIN_ITEMS, parent::ARRAY_MAX_ITEMS); $i <= parent::ARRAY_MAX_ITEMS; ++$i) {
            $randomString = $this->randomString();
            $lines[] = $randomString;
        }

        $expect = "\n";
        foreach ($lines as $line) {
            $expect .= "• " . $line . "\n";
        }
        $actual = $this->formatListMarker($lines);

        $this->assertEquals($expect, $actual);

        $this->expectException(\InvalidArgumentException::class);
        $this->formatListMarker([]);
    }

    public function testFormatListNumeric()
    {
        $lines = [];
        for ($i = rand(parent::ARRAY_MIN_ITEMS, parent::ARRAY_MAX_ITEMS); $i <= parent::ARRAY_MAX_ITEMS; ++$i) {
            $randomString = $this->randomString();
            $lines[] = $randomString;
        }

        $expect = "\n";
        foreach ($lines as $key => $line) {
            $expect .= sprintf("%d. %s\n", $key + 1, $line);
        }
        $actual = $this->formatListNumeric($lines);

        $this->assertEquals($expect, $actual);

        $this->expectException(\InvalidArgumentException::class);
        $this->formatListNumeric([]);
    }

    public function testFormatCode()
    {
        $lines = [];
        for ($i = rand(parent::ARRAY_MIN_ITEMS, parent::ARRAY_MAX_ITEMS); $i <= parent::ARRAY_MAX_ITEMS; ++$i) {
            $randomString = $this->randomString();
            $lines[] = $randomString;
        }

        $expect = sprintf(
            "%s%s%s",
            "\n```",
            $this->inlineMultilines($lines),
            "```\n"
        );
        $actual = $this->formatCode($lines);

        $this->assertEquals($expect, $actual);
    }

    public function testNewLine()
    {
        $expect = "\n";
        $actual = $this->newLine();

        $this->assertEquals($expect, $actual);
    }

    public function testFormatLink()
    {
        $url = $this->randomString();
        $title = $this->randomString();

        $expect = sprintf("<%s|%s>", $url, $title);
        $actual = $this->formatLink($title, $url);

        $this->assertEquals($expect, $actual);
    }

    public function testEscapeCharacters()
    {
        $expect = $testString = $this->randomString() . '<&>';
        $expect = str_replace('&', '&amp;', $expect);
        $expect = str_replace('<', '&lt;', $expect);
        $expect = str_replace('>', '&gt;', $expect);
        $actual = $this->escapeCharacters($testString);

        $this->assertEquals($expect, $actual);
    }
}
