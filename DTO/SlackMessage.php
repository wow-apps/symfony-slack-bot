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

namespace WowApps\SlackBundle\DTO;

/**
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackMessage
{
    /** @var string */
    private $username;

    /** @var string */
    private $channel;

    /** @var string */
    private $iconUrl;

    /** @var string */
    private $iconEmoji;

    /** @var bool */
    private $markdown;

    /** @var string */
    private $text;

    /** @var Attachment[] */
    private $attachments;

    /**
     * SlackMessage constructor.
     *
     * @param string $text
     * @param string $username
     * @param string $channel
     * @param string $iconUrl
     * @param string $iconEmoji
     * @param bool   $markdown
     * @param array  $attachments
     */
    public function __construct(
        string $text = '',
        string $username = '',
        string $channel = '',
        string $iconUrl = '',
        string $iconEmoji = '',
        bool   $markdown = true,
        array  $attachments = []
    ) {
        $this->text = $text;
        $this->username = $username;
        $this->channel = $channel;
        $this->iconUrl = $iconUrl;
        $this->iconEmoji = $iconEmoji;
        $this->markdown = $markdown;
        $this->attachments = $attachments;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return SlackMessage
     */
    public function setUsername(string $username): SlackMessage
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     *
     * @return SlackMessage
     */
    public function setChannel(string $channel): SlackMessage
    {
        $this->channel = $channel;

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
     *
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
     *
     * @return SlackMessage
     */
    public function setIconEmoji(string $iconEmoji): SlackMessage
    {
        $this->iconEmoji = $iconEmoji;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMarkdown(): bool
    {
        return $this->markdown;
    }

    /**
     * @param bool $markdown
     *
     * @return SlackMessage
     */
    public function setMarkdown(bool $markdown): SlackMessage
    {
        $this->markdown = $markdown;

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
     *
     * @return SlackMessage
     */
    public function setText(string $text): SlackMessage
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Attachment[]
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * @param Attachment[] $attachments
     *
     * @return SlackMessage
     */
    public function setAttachments(array $attachments): SlackMessage
    {
        $this->attachments = $attachments;

        return $this;
    }

    /**
     * @param Attachment $attachment
     *
     * @return SlackMessage
     */
    public function appendAttachment(Attachment $attachment): SlackMessage
    {
        if (empty($this->attachments)) {
            $this->attachments = [];
        }

        $this->attachments[] = $attachment;

        return $this;
    }
}
