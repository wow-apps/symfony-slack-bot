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
 * Class AttachmentAction.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class AttachmentAction
{
    const STYLE_DEFAULT = 'default';
    const STYLE_PRIMARY = 'primary';
    const STYLE_DANGER = 'danger';

    const TYPE_BUTTON = 'button';
    const TYPE_SELECT = 'select';

    /** @var string */
    private $name;

    /** @var string */
    private $text;

    /** @var string */
    private $url;

    /** @var string */
    private $style;

    /** @var string */
    private $type;

    /** @var string */
    private $value;

    /** @var AttachmentActionConfirm */
    private $confirm;

    /**
     * AttachmentAction constructor.
     *
     * @param string                  $text
     * @param string                  $url
     * @param string                  $style
     * @param AttachmentActionConfirm $confirm
     */
    public function __construct(
        string $text = '',
        string $url = '',
        string $style = self::STYLE_DEFAULT,
        AttachmentActionConfirm $confirm = null
    ) {
        $this->name = '';
        $this->value = '';
        $this->text = $text;
        $this->url = $url;
        $this->style = $style;
        $this->type = self::TYPE_BUTTON;
        $this->confirm = is_null($confirm) ? new AttachmentActionConfirm() : $confirm;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return AttachmentAction
     */
    public function setName(string $name): AttachmentAction
    {
        $this->name = $name;

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
     * @return AttachmentAction
     */
    public function setText(string $text): AttachmentAction
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return AttachmentAction
     */
    public function setUrl(string $url): AttachmentAction
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getStyle(): string
    {
        return $this->style;
    }

    /**
     * @param string $style
     *
     * @return AttachmentAction
     */
    public function setStyle(string $style): AttachmentAction
    {
        $this->style = $style;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return AttachmentAction
     */
    public function setType(string $type): AttachmentAction
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return AttachmentActionConfirm
     */
    public function getConfirm(): AttachmentActionConfirm
    {
        return $this->confirm;
    }

    /**
     * @param AttachmentActionConfirm $confirm
     *
     * @return AttachmentAction
     */
    public function setConfirm(AttachmentActionConfirm $confirm): AttachmentAction
    {
        $this->confirm = $confirm;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return AttachmentAction
     */
    public function setValue(string $value): AttachmentAction
    {
        $this->value = $value;

        return $this;
    }
}
