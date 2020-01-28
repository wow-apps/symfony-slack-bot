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

namespace WowApps\SlackBundle\Tests\Service;

use WowApps\SlackBundle\Exception\SlackbotException;
use WowApps\SlackBundle\Service\SlackMarkdown;
use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class SlackMarkdownTest.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackMarkdownTest extends TestCase
{
    public function testNewLine()
    {
        $this->assertTrue(is_string(SlackMarkdown::newLine()));
        $this->assertSame("\n", SlackMarkdown::newLine());

        $expected = '';
        for ($lineNumber = 1; $lineNumber <= 5; ++$lineNumber) {
            $expected .= "\n";
            $this->assertSame($expected, SlackMarkdown::newLine($lineNumber));
        }
    }

    public function testNewLineWithException()
    {
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_WRONG_LINES_NUMBER);
        SlackMarkdown::newLine(7);
    }

    public function testBold()
    {
        $actualText = $this->randomString();
        $expected = sprintf('*%s*', $actualText);
        $this->assertTrue(is_string(SlackMarkdown::bold($actualText)));
        $this->assertSame($expected, SlackMarkdown::bold($actualText));
    }

    public function testItalic()
    {
        $actualText = $this->randomString();
        $expected = sprintf('_%s_', $actualText);
        $this->assertTrue(is_string(SlackMarkdown::italic($actualText)));
        $this->assertSame($expected, SlackMarkdown::italic($actualText));
    }

    public function testStrike()
    {
        $actualText = $this->randomString();
        $expected = sprintf('~%s~', $actualText);
        $this->assertTrue(is_string(SlackMarkdown::strike($actualText)));
        $this->assertSame($expected, SlackMarkdown::strike($actualText));
    }

    public function testLink()
    {
        $actualText = $this->randomString();
        $actualLink = $this->randomString();
        $expected = sprintf('<%s|%s>', $actualLink, $actualText);
        $this->assertTrue(is_string(SlackMarkdown::link($actualText, $actualLink)));
        $this->assertSame($expected, SlackMarkdown::link($actualText, $actualLink));
    }

    public function testMultilines()
    {
        $actual = [];
        foreach (range(0, rand(5, 10)) as $key) {
            $actual[$key] = $this->randomString();
        }

        $expected = implode("\n", $actual);
        $this->assertTrue(is_string(SlackMarkdown::multilines($actual)));
        $this->assertSame($expected, SlackMarkdown::multilines($actual));
    }

    public function testList()
    {
        $actual = [];
        foreach (range(0, rand(5, 10)) as $key) {
            $actual[$key] = $this->randomString();
        }

        $expectedType1Array = [];
        $expectedType2Array = [];
        $elementNumber = 0;

        foreach ($actual as $key => $value) {
            $expectedType1Array[$key] = sprintf('• %s', $value);
            $expectedType2Array[$key] = sprintf("%s. %s\n", ++$elementNumber, $value);
        }

        $expectedType1 = sprintf("\n%s\n", implode("\n", $expectedType1Array));
        $expectedType2 = sprintf("\n%s\n", implode("\n", $expectedType2Array));

        $this->assertTrue(is_string(SlackMarkdown::list($actual, SlackMarkdown::LIST_MARKER)));
        $this->assertSame($expectedType1, SlackMarkdown::list($actual, SlackMarkdown::LIST_MARKER));
        $this->assertTrue(is_string(SlackMarkdown::list($actual, SlackMarkdown::LIST_NUMERIC)));
        $this->assertSame($expectedType2, SlackMarkdown::list($actual, SlackMarkdown::LIST_NUMERIC));
    }

    public function testListEmptyArgument()
    {
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_EMPTY_LIST);
        SlackMarkdown::list([]);
    }

    public function testListWrongListType()
    {
        $actual = [];
        foreach (range(0, rand(5, 10)) as $key) {
            $actual[$key] = $this->randomString();
        }

        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_INCORRECT_LIST_TYPE);
        SlackMarkdown::list($actual, $this->randomString());
    }

    public function testInlineCode()
    {
        $actualText = $this->randomString();
        $expected = sprintf('`%s`', $actualText);
        $this->assertTrue(is_string(SlackMarkdown::inlineCode($actualText)));
        $this->assertSame($expected, SlackMarkdown::inlineCode($actualText));
    }

    public function testCode()
    {
        $actual = [];
        foreach (range(0, rand(5, 10)) as $key) {
            $actual[$key] = $this->randomString();
        }

        $expected = "\n```\n" . SlackMarkdown::multilines($actual) . "\n```\n";

        $this->assertTrue(is_string(SlackMarkdown::code($actual)));
        $this->assertSame($expected, SlackMarkdown::code($actual));
    }
}
