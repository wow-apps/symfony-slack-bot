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

namespace WowApps\SlackBundle\DTO;

use WowApps\SlackBundle\Traits\SlackMessageTrait;

/**
 * Class SlackMessage
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 */
class SlackMessage
{
    use SlackMessageTrait;

    /** @var string */
    private $icon;

    /** @var string */
    private $text;

    /** @var int */
    private $quoteType;

    /** @var string */
    private $quoteTitle;

    /** @var string */
    private $quoteTitleLink;

    /** @var string */
    private $quoteText;

    /** @var bool */
    private $showQuote;

    /** @var string */
    private $recipient;

    /** @var string */
    private $sender;

    /**
     * SlackMessage constructor.
     * @param string $icon
     * @param string $text
     * @param int $quoteType
     * @param string $quoteTitle
     * @param string $quoteTitleLink
     * @param string $quoteText
     * @param bool $showQuote
     * @param string $recipient
     * @param string $sender
     */
    public function __construct(
        string  $icon = '',
        string  $text = '',
        int     $quoteType = 0,
        string  $quoteTitle = '',
        string  $quoteTitleLink = '',
        string  $quoteText = '',
        bool    $showQuote = false,
        string  $recipient = '',
        string  $sender = ''
    ) {
        $this
            ->setIcon($icon)
            ->setText($text)
            ->setQuoteType($quoteType)
            ->setQuoteTitle($quoteTitle)
            ->setQuoteTitleLink($quoteTitleLink)
            ->setQuoteText($quoteText)
            ->setShowQuote($showQuote)
            ->setRecipient($recipient)
            ->setSender($sender)
        ;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return SlackMessage
     */
    public function setIcon(string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return SlackMessage
     */
    public function setText(string $text)
    {
        $this->text = $this->escapeCharacters($text);
        return $this;
    }

    /**
     * @return int
     */
    public function getQuoteType(): int
    {
        return $this->quoteType;
    }

    /**
     * @param int $quoteType
     * @return SlackMessage
     */
    public function setQuoteType(int $quoteType)
    {
        $this->quoteType = $quoteType;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuoteTitle(): string
    {
        return $this->quoteTitle;
    }

    /**
     * @param string $quoteTitle
     * @return SlackMessage
     */
    public function setQuoteTitle(string $quoteTitle)
    {
        $this->quoteTitle = $this->escapeCharacters($quoteTitle);
        return $this;
    }

    /**
     * @return string
     */
    public function getQuoteTitleLink(): string
    {
        return $this->quoteTitleLink;
    }

    /**
     * @param string $quoteTitleLink
     * @return SlackMessage
     */
    public function setQuoteTitleLink(string $quoteTitleLink)
    {
        $this->quoteTitleLink = $this->escapeCharacters($quoteTitleLink);
        return $this;
    }

    /**
     * @return string
     */
    public function getQuoteText(): string
    {
        return $this->quoteText;
    }

    /**
     * @param string $quoteText
     * @return SlackMessage
     */
    public function setQuoteText(string $quoteText)
    {
        $this->quoteText = $this->escapeCharacters($quoteText);
        return $this;
    }

    /**
     * @return bool
     */
    public function isShowQuote(): bool
    {
        return $this->showQuote;
    }

    /**
     * @param bool $showQuote
     * @return SlackMessage
     */
    public function setShowQuote(bool $showQuote)
    {
        $this->showQuote = $showQuote;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecipient(): string
    {
        return $this->recipient;
    }

    /**
     * @param string $recipient
     * @return SlackMessage
     */
    public function setRecipient(string $recipient)
    {
        $this->recipient = $this->escapeCharacters($recipient);
        return $this;
    }

    /**
     * @return string
     */
    public function getSender(): string
    {
        return $this->sender;
    }

    /**
     * @param string $sender
     * @return SlackMessage
     */
    public function setSender(string $sender)
    {
        $this->sender = $this->escapeCharacters($sender);
        return $this;
    }
}
