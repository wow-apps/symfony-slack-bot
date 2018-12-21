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

namespace WowApps\SlackBundle\Traits;

use WowApps\SlackBundle\Exception\SlackbotException;

/**
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 * @see https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers
 */
trait SlackMessageTrait
{
    /**
     * @param array $lines
     * @return string
     * @see https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers#multilines
     */
    public function inlineMultilines(array $lines): string
    {
        return implode("\n", $lines);
    }

    /**
     * @param string $string
     * @return string
     * @see https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers#bold-text
     */
    public function formatBold(string $string): string
    {
        return sprintf("*%s*", $string);
    }

    /**
     * @param string $string
     * @return string
     * @see https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers#italic-text
     */
    public function formatItalic(string $string): string
    {
        return sprintf("_%s_", $string);
    }

    /**
     * @param string $string
     * @return string
     * @see https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers#strike-thought-text
     */
    public function formatStrikeThought(string $string): string
    {
        return sprintf("~%s~", $string);
    }

    /**
     * @param array $list
     * @return string
     * @throws SlackbotException
     * @see https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers#unordered-list
     */
    public function formatListMarker(array $list): string
    {
        if (empty($list)) {
            throw new SlackbotException(SlackbotException::E_EMPTY_LIST);
        }

        foreach ($list as $key => $value) {
            $list[$key] = sprintf('• %s', $value);
        }

        return sprintf("\n%s\n", implode("\n", $list));
    }

    /**
     * @param array $list
     * @return string
     * @throws SlackbotException
     * @see https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers#ordered-list
     */
    public function formatListNumeric(array $list): string
    {
        if (empty($list)) {
            throw new SlackbotException(SlackbotException::E_EMPTY_LIST);
        }

        $num = 0;
        $output = "\n";
        foreach ($list as $value) {
            $output .= sprintf("%s. %s\n", ++$num, $value);
        }

        return $output;
    }

    /**
     * @param array $lines
     * @return string
     * @see https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers#code
     */
    public function formatCode(array $lines): string
    {
        $output = "\n```";
        $output .= $this->inlineMultilines($lines);
        $output .= "```\n";

        return $output;
    }

    /**
     * @return string
     * @see https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers#new-line
     */
    public function newLine(): string
    {
        return "\n";
    }

    /**
     * @param string $title
     * @param string $url
     * @return string
     * @see https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers#clickable-link
     */
    public function formatLink(string $title, string $url): string
    {
        return sprintf("<%s|%s>", $url, $title);
    }

    /**
     * @param string $string
     * @return string
     * @deprecated
     * @see https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers#escape-special-characters
     */
    public function escapeCharacters(string $string): string
    {
        return str_replace('&', '&amp;', $string);
    }
}
