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

/**
 * Trait SlackMessageTrait
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 */
trait SlackMessageTrait
{
    /**
     * @param array $lines
     * @return string
     */
    public function inlineMultilines(array $lines): string
    {
        return implode("\n", $lines);
    }

    /**
     * @param string $string
     * @return string
     */
    public function formatBold(string $string): string
    {
        return '*' . $string . '*';
    }

    /**
     * @param string $string
     * @return string
     */
    public function formatItalic(string $string): string
    {
        return '_' . $string . '_';
    }

    /**
     * @param string $string
     * @return string
     */
    public function formatStrikeThought(string $string): string
    {
        return '~' . $string . '~';
    }

    /**
     * @param array $list
     * @return string
     * @throws \InvalidArgumentException
     */
    public function formatListMarker(array $list): string
    {
        if (empty($list)) {
            throw new \InvalidArgumentException('The list must contain at least one value');
        }

        $output = "\n";
        foreach ($list as $value) {
            $output .= "• " . $value . "\n";
        }

        return $output;
    }

    /**
     * @param array $list
     * @return string
     * @throws \InvalidArgumentException
     */
    public function formatListNumeric(array $list): string
    {
        if (empty($list)) {
            throw new \InvalidArgumentException('The list must contain at least one value');
        }

        $n = 0;
        $output = "\n";
        foreach ($list as $value) {
            $output .= ++$n . ". " . $value . "\n";
        }

        return $output;
    }

    /**
     * @param array $lines
     * @return string
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
     */
    public function newLine(): string
    {
        return "\n";
    }

    /**
     * @param string $title
     * @param string $url
     * @return string
     */
    public function formatLink(string $title, string $url): string
    {
        return "<" . $url . "|" . $title . ">";
    }

    /**
     * @param string $string
     * @return string
     */
    public function escapeCharacters(string $string): string
    {
        $string = str_replace('&', '&amp;', $string);
        $string = str_replace('<', '&lt;', $string);
        $string = str_replace('>', '&gt;', $string);
        return $string;
    }
}
