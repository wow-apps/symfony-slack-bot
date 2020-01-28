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

namespace WowApps\SlackBundle\Entity;

/**
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackMessage
{
    /** @var string */
    private $username;

    /**
     * @deprecated
     *
     * @var string
     */
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
        bool $markdown = true,
        array $attachments = []
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
     * Returns the user name on behalf of which the message will be sent.
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the user name on behalf of which the message will be sent.
     *
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
     * Returns the name of channel where the message will be sent.
     *
     * @deprecated
     *
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * Set the name of channel where the message will be sent.
     *
     * @deprecated
     *
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
     * Returns icon url of message.
     *
     * @return string
     */
    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    /**
     * Set the icon url for a message.
     *
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
     * Returns icon Emoji of message.
     *
     * @return string
     */
    public function getIconEmoji(): string
    {
        return $this->iconEmoji;
    }

    /**
     * Set the icon Emoji for a message.
     *
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
     * Returns state of markdown support of message.
     *
     * @return bool
     */
    public function isMarkdown(): bool
    {
        return $this->markdown;
    }

    /**
     * Set the state of markdown support of message.
     *
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
     * Returns main text of message.
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Set the main text of message.
     *
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
     * Returns collection of Attachment DTOs.
     *
     * @return Attachment[]
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * Set collection of Attachment DTOs.
     *
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
     * Appends Attachment DTO to collection.
     *
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
