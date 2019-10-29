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
 * Class AttachmentField.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class AttachmentField
{
    /** @var string */
    private $title;

    /** @var string */
    private $value;

    /** @var bool */
    private $short;

    /**
     * MessageAttachmentField constructor.
     *
     * @param string $title
     * @param string $value
     * @param bool   $short
     */
    public function __construct(string $title = '', string $value = '', bool $short = false)
    {
        $this->title = $title;
        $this->value = $value;
        $this->short = $short;
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
     * @return AttachmentField
     */
    public function setTitle(string $title): AttachmentField
    {
        $this->title = $title;

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
     * @return AttachmentField
     */
    public function setValue(string $value): AttachmentField
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function isShort(): bool
    {
        return $this->short;
    }

    /**
     * @param bool $short
     *
     * @return AttachmentField
     */
    public function setShort(bool $short): AttachmentField
    {
        $this->short = $short;

        return $this;
    }
}
