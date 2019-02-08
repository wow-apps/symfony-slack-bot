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

    /** @var string */
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
     * @param string             $timestamp
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
        string $timestamp = '',
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
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
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
     * @return string
     */
    public function getPretext(): string
    {
        return $this->pretext;
    }

    /**
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
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    /**
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
     * @return string
     */
    public function getAuthorLink(): string
    {
        return $this->authorLink;
    }

    /**
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
     * @return string
     */
    public function getAuthorIconUrl(): string
    {
        return $this->authorIconUrl;
    }

    /**
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
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
     * @return string
     */
    public function getTitleLink(): string
    {
        return $this->titleLink;
    }

    /**
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
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
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
     * @return AttachmentField[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
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
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
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
     * @return string
     */
    public function getThumbUrl(): string
    {
        return $this->thumbUrl;
    }

    /**
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
     * @return string
     */
    public function getFooter(): string
    {
        return $this->footer;
    }

    /**
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
     * @return string
     */
    public function getFooterIconUrl(): string
    {
        return $this->footerIconUrl;
    }

    /**
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
     * @return string
     */
    public function getFallback(): string
    {
        return $this->fallback;
    }

    /**
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
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     *
     * @return Attachment
     */
    public function setTimestamp(string $timestamp = ''): Attachment
    {
        $this->timestamp = empty($timestamp) ? time() : $timestamp;

        return $this;
    }

    /**
     * @return AttachmentAction[]
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    /**
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
