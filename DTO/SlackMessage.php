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
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 * @see https://github.com/wow-apps/symfony-slack-bot/wiki/2.-Using-SlackBot#fill-dto
 */
class SlackMessage
{
    use SlackMessageTrait;

    /**
     * This property will be removed in version 3.3
     *
     * @deprecated
     * @var string
     */
    private $icon;

    /** @var string */
    private $iconUrl;

    /** @var string */
    private $iconEmoji;

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
     * This method will be removed in version 3.3
     *
     * @deprecated
     * @return string
     */
    public function getIcon(): string
    {
        // TODO: this dirty hack will be removed in version 3.3
        if (!empty($this->getIconUrl())) {
            return $this->getIconUrl();
        }

        if (!empty($this->getIconEmoji())) {
            return $this->getIconEmoji();
        }

        return '';
    }

    /**
     * This method will be removed in version 3.3
     *
     * @deprecated
     * @param string $icon
     * @return SlackMessage
     */
    public function setIcon(string $icon): SlackMessage
    {
        // TODO: this dirty hack will be removed in version 3.3
        if (preg_match('/^\:(.*?)\:$/i', $icon)) {
            $this->setIconEmoji($icon);
            return $this;
        }

        $this->setIconUrl($icon);
        return $this;
    }

    /**
     * @return string
     */
    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    /**
     * @param string $iconUrl
     * @return SlackMessage
     */
    public function setIconUrl(string $iconUrl): SlackMessage
    {
        $this->iconUrl = $iconUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getIconEmoji(): string
    {
        return $this->iconEmoji;
    }

    /**
     * @param string $iconEmoji
     * @return SlackMessage
     */
    public function setIconEmoji(string $iconEmoji): SlackMessage
    {
        $this->iconEmoji = $iconEmoji;
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
    public function setText(string $text): SlackMessage
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
    public function setQuoteType(int $quoteType): SlackMessage
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
    public function setQuoteTitle(string $quoteTitle): SlackMessage
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
    public function setQuoteTitleLink(string $quoteTitleLink): SlackMessage
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
    public function setQuoteText(string $quoteText): SlackMessage
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
    public function setShowQuote(bool $showQuote): SlackMessage
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
    public function setRecipient(string $recipient): SlackMessage
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
    public function setSender(string $sender): SlackMessage
    {
        $this->sender = $this->escapeCharacters($sender);
        return $this;
    }
}
