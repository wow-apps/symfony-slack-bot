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

namespace WowApps\SlackBundle\Service;

use WowApps\SlackBundle\Exception\SlackbotException;

/**
 * Trait SlackMarkdownTrait.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackMarkdown
{
    const LIST_MARKER = 'marker';
    const LIST_NUMERIC = 'numeric';

    /**
     * @param int $linesNumber Minimum 1, maximum 5
     *
     * @return string
     */
    public static function newLine(int $linesNumber = 1): string
    {
        if ($linesNumber < 1 || $linesNumber > 5) {
            throw new SlackbotException(
                SlackbotException::E_WRONG_LINES_NUMBER,
                ['requested_lines_number: ' . $linesNumber, 'allowed_lines_number: from 1 to 5']
            );
        }

        $result = '';

        for ($lineNumber = 1; $lineNumber <= $linesNumber; ++$lineNumber) {
            $result .= "\n";
        }

        return $result;
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public static function bold(string $string): string
    {
        return sprintf('*%s*', $string);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public static function italic(string $string): string
    {
        return sprintf('_%s_', $string);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public static function strike(string $string): string
    {
        return sprintf('~%s~', $string);
    }

    /**
     * @param string $title
     * @param string $url
     *
     * @return string
     */
    public static function link(string $title, string $url): string
    {
        return sprintf('<%s|%s>', $url, $title);
    }

    /**
     * @param array $lines
     *
     * @return string
     */
    public static function multilines(array $lines): string
    {
        return implode("\n", $lines);
    }

    /**
     * @param array  $list
     * @param string $listType
     *
     * @return string
     *
     * @throws SlackbotException
     */
    public static function list(array $list, string $listType = self::LIST_MARKER): string
    {
        if (empty($list)) {
            throw new SlackbotException(SlackbotException::E_EMPTY_LIST);
        }

        if (!in_array($listType, [self::LIST_MARKER, self::LIST_NUMERIC])) {
            throw new SlackbotException(
                SlackbotException::E_INCORRECT_LIST_TYPE,
                [
                    'actual_type: ' . $listType,
                    'expected_type: ' . self::LIST_MARKER . ' or ' . self::LIST_NUMERIC,
                ]
            );
        }

        $elementNumber = 0;

        foreach ($list as $key => $value) {
            if (self::LIST_MARKER == $listType) {
                $list[$key] = sprintf('• %s', $value);
                continue;
            }

            $list[$key] = sprintf("%s. %s\n", ++$elementNumber, $value);
        }

        return sprintf("\n%s\n", implode("\n", $list));
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public static function inlineCode(string $string): string
    {
        return sprintf('`%s`', $string);
    }

    /**
     * @param array $lines
     *
     * @return string
     */
    public static function code(array $lines): string
    {
        $output = "\n```\n";
        $output .= self::multilines($lines);
        $output .= "\n```\n";

        return $output;
    }
}
