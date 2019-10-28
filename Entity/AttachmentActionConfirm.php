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
 * Class AttachmentActionConfirm.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class AttachmentActionConfirm
{
    const BUTTON_DEFAULT_TEXT_OK = 'OK';
    const BUTTON_DEFAULT_TEXT_DISMISS = 'Cancel';

    /** @var bool */
    private $active;

    /** @var string */
    private $title;

    /** @var string */
    private $text;

    /** @var string */
    private $buttonOkText;

    /** @var string */
    private $buttonDismissText;

    /**
     * AttachmentActionConfirm constructor.
     *
     * @param bool   $active
     * @param string $title
     * @param string $text
     * @param string $buttonOkText
     * @param string $buttonDismissText
     */
    public function __construct(
        bool   $active = false,
        string $title = '',
        string $text = '',
        string $buttonOkText = self::BUTTON_DEFAULT_TEXT_OK,
        string $buttonDismissText = self::BUTTON_DEFAULT_TEXT_DISMISS
    ) {
        $this->active = $active;
        $this->title = $title;
        $this->text = $text;
        $this->buttonOkText = $buttonOkText;
        $this->buttonDismissText = $buttonDismissText;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     *
     * @return AttachmentActionConfirm
     */
    public function setActive(bool $active): AttachmentActionConfirm
    {
        $this->active = $active;

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
     * @return AttachmentActionConfirm
     */
    public function setTitle(string $title): AttachmentActionConfirm
    {
        $this->title = $title;

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
     * @return AttachmentActionConfirm
     */
    public function setText(string $text): AttachmentActionConfirm
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getButtonOkText(): string
    {
        return $this->buttonOkText;
    }

    /**
     * @param string $buttonOkText
     *
     * @return AttachmentActionConfirm
     */
    public function setButtonOkText(string $buttonOkText): AttachmentActionConfirm
    {
        $this->buttonOkText = $buttonOkText;

        return $this;
    }

    /**
     * @return string
     */
    public function getButtonDismissText(): string
    {
        return $this->buttonDismissText;
    }

    /**
     * @param string $buttonDismissText
     *
     * @return AttachmentActionConfirm
     */
    public function setButtonDismissText(string $buttonDismissText): AttachmentActionConfirm
    {
        $this->buttonDismissText = $buttonDismissText;

        return $this;
    }
}
