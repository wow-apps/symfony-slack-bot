<?php
/**
 * Created by PhpStorm
 * User: Alexey Samara
 */

namespace WoWApps\SlackBotBundle\DTO;

class SlackMessage
{
    /** @var string */
    private $text;

    /** @var int */
    private $quoteType;

    /** @var string */
    private $quoteTitle;

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
     * @param string $text
     * @param int $quoteType
     * @param string $quoteTitle
     * @param string $quoteText
     * @param bool $showQuote
     * @param string $recipient
     * @param string $sender
     */
    public function __construct(
        string $text = '',
        int $quoteType = 0,
        string $quoteTitle = '',
        string $quoteText = '',
        bool $showQuote = false,
        string $recipient = '',
        string $sender = ''
    ) {
        $this
            ->setText($text)
            ->setQuoteType($quoteType)
            ->setQuoteTitle($quoteTitle)
            ->setQuoteText($quoteText)
            ->setShowQuote($showQuote)
            ->setRecipient($recipient)
            ->setSender($sender);
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
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;
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
     * @return $this
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
     * @return $this
     */
    public function setQuoteTitle(string $quoteTitle)
    {
        $this->quoteTitle = $quoteTitle;
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
     * @return $this
     */
    public function setQuoteText(string $quoteText)
    {
        $this->quoteText = $quoteText;
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
     * @return $this
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
     * @return $this
     */
    public function setRecipient(string $recipient)
    {
        $this->recipient = $recipient;
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
     * @return $this
     */
    public function setSender(string $sender)
    {
        $this->sender = $sender;
        return $this;
    }
}
