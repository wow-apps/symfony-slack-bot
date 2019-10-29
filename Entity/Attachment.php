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

namespace WowApps\SlackBundle\Entity;

/**
 * Class Attachment.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class Attachment
{
    /** @var string */
    private $color;

    /** @var string */
    private $pretext;

    /** @var string */
    private $authorName;

    /** @var string */
    private $authorLink;

    /** @var string */
    private $authorIconUrl;

    /** @var string */
    private $title;

    /** @var string */
    private $titleLink;

    /** @var string */
    private $text;

    /** @var string */
    private $imageUrl;

    /** @var string */
    private $thumbUrl;

    /** @var string */
    private $footer;

    /** @var string */
    private $footerIconUrl;

    /** @var string */
    private $fallback;

    /** @var int */
    private $timestamp;

    /** @var AttachmentField[] */
    private $fields;

    /** @var AttachmentAction[] */
    private $actions;

    /**
     * MessageAttachment constructor.
     *
     * @param string             $color
     * @param string             $pretext
     * @param string             $authorName
     * @param string             $authorLink
     * @param string             $authorIconUrl
     * @param string             $title
     * @param string             $titleLink
     * @param string             $text
     * @param string             $imageUrl
     * @param string             $thumbUrl
     * @param string             $footer
     * @param string             $footerIconUrl
     * @param string             $fallback
     * @param int                $timestamp
     * @param AttachmentField[]  $fields
     * @param AttachmentAction[] $actions
     */
    public function __construct(
        string $color = '',
        string $pretext = '',
        string $authorName = '',
        string $authorLink = '',
        string $authorIconUrl = '',
        string $title = '',
        string $titleLink = '',
        string $text = '',
        string $imageUrl = '',
        string $thumbUrl = '',
        string $footer = '',
        string $footerIconUrl = '',
        string $fallback = '',
        int $timestamp = 0,
        array  $fields = [],
        array  $actions = []
    ) {
        $this->color = $color;
        $this->pretext = $pretext;
        $this->authorName = $authorName;
        $this->authorLink = $authorLink;
        $this->authorIconUrl = $authorIconUrl;
        $this->title = $title;
        $this->titleLink = $titleLink;
        $this->text = $text;
        $this->fields = $fields;
        $this->imageUrl = $imageUrl;
        $this->thumbUrl = $thumbUrl;
        $this->footer = $footer;
        $this->footerIconUrl = $footerIconUrl;
        $this->fallback = $fallback;
        $this->timestamp = $timestamp;
        $this->actions = $actions;
    }

    /**
     * Returns attachment's left border color.
     *
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Set attachment’s left border color.
     *
     * @param string $color
     *
     * @return Attachment
     */
    public function setColor(string $color): Attachment
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Returns text, that shown before attachment.
     *
     * @return string
     */
    public function getPretext(): string
    {
        return $this->pretext;
    }

    /**
     * Set the text, that shown before attachment.
     *
     * @param string $pretext
     *
     * @return Attachment
     */
    public function setPretext(string $pretext): Attachment
    {
        $this->pretext = $pretext;

        return $this;
    }

    /**
     * Returns name of the attachment's author.
     *
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    /**
     * Set the attachment's author name.
     *
     * @param string $authorName
     *
     * @return Attachment
     */
    public function setAuthorName(string $authorName): Attachment
    {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * Returns attachment's author link.
     *
     * @return string
     */
    public function getAuthorLink(): string
    {
        return $this->authorLink;
    }

    /**
     * Set the attachment's author link.
     *
     * @param string $authorLink
     *
     * @return Attachment
     */
    public function setAuthorLink(string $authorLink): Attachment
    {
        $this->authorLink = $authorLink;

        return $this;
    }

    /**
     * Returns attachment's author icon url.
     *
     * @return string
     */
    public function getAuthorIconUrl(): string
    {
        return $this->authorIconUrl;
    }

    /**
     * Set the attachment's author icon url.
     *
     * @param string $authorIconUrl
     *
     * @return Attachment
     */
    public function setAuthorIconUrl(string $authorIconUrl): Attachment
    {
        $this->authorIconUrl = $authorIconUrl;

        return $this;
    }

    /**
     * Returns attachment title.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set attachment title.
     *
     * @param string $title
     *
     * @return Attachment
     */
    public function setTitle(string $title): Attachment
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Returns attachment title link.
     *
     * @return string
     */
    public function getTitleLink(): string
    {
        return $this->titleLink;
    }

    /**
     * Set attachment title link.
     *
     * @param string $titleLink
     *
     * @return Attachment
     */
    public function setTitleLink(string $titleLink): Attachment
    {
        $this->titleLink = $titleLink;

        return $this;
    }

    /**
     * Returns attachment main text.
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Set attachment main text.
     *
     * @param string $text
     *
     * @return Attachment
     */
    public function setText(string $text): Attachment
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Returns collection of attachment fields.
     *
     * @return AttachmentField[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Set collection of attachment fields.
     *
     * @param AttachmentField[] $fields
     *
     * @return Attachment
     */
    public function setFields(array $fields): Attachment
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * Append attachment fields to collection.
     *
     * @param AttachmentField $field
     *
     * @return Attachment
     */
    public function appendField(AttachmentField $field): Attachment
    {
        if (empty($this->fields)) {
            $this->fields = [];
        }

        $this->fields[] = $field;

        return $this;
    }

    /**
     * Returns attachment image url.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * Set attachment image url.
     *
     * @param string $imageUrl
     *
     * @return Attachment
     */
    public function setImageUrl(string $imageUrl): Attachment
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Returns attachment image thumb url.
     *
     * @return string
     */
    public function getThumbUrl(): string
    {
        return $this->thumbUrl;
    }

    /**
     * Set attachment image url.
     *
     * @param string $thumbUrl
     *
     * @return Attachment
     */
    public function setThumbUrl(string $thumbUrl): Attachment
    {
        $this->thumbUrl = $thumbUrl;

        return $this;
    }

    /**
     * Returns attachment footer text.
     *
     * @return string
     */
    public function getFooter(): string
    {
        return $this->footer;
    }

    /**
     * Set attachment footer text.
     *
     * @param string $footer
     *
     * @return Attachment
     */
    public function setFooter(string $footer): Attachment
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * Returns attachment footer icon url.
     *
     * @return string
     */
    public function getFooterIconUrl(): string
    {
        return $this->footerIconUrl;
    }

    /**
     * Set attachment footer icon url.
     *
     * @param string $footerIconUrl
     *
     * @return Attachment
     */
    public function setFooterIconUrl(string $footerIconUrl): Attachment
    {
        $this->footerIconUrl = $footerIconUrl;

        return $this;
    }

    /**
     * Returns attachment fallback text.
     *
     * @return string
     */
    public function getFallback(): string
    {
        return $this->fallback;
    }

    /**
     * Set attachment fallback text.
     *
     * @param string $fallback
     *
     * @return Attachment
     */
    public function setFallback(string $fallback): Attachment
    {
        $this->fallback = $fallback;

        return $this;
    }

    /**
     * Returns attachment timestamp, placed in footer.
     *
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * Set attachment timestamp, placed in footer.
     *
     * @param int $timestamp
     *
     * @return Attachment
     */
    public function setTimestamp(int $timestamp = 0): Attachment
    {
        $this->timestamp = empty($timestamp) ? time() : $timestamp;

        return $this;
    }

    /**
     * Returns array of attachment actions.
     *
     * @return AttachmentAction[]
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    /**
     * Set array of attachment actions.
     *
     * @param AttachmentAction[] $actions
     *
     * @return Attachment
     */
    public function setActions(array $actions): Attachment
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * Append action to attachment.
     *
     * @param AttachmentAction $action
     *
     * @return Attachment
     */
    public function appendAction(AttachmentAction $action): Attachment
    {
        if (empty($this->actions)) {
            $this->actions = [];
        }

        $this->actions[] = $action;

        return $this;
    }
}
