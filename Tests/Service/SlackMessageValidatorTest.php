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

namespace WowApps\SlackBundle\Tests\Service;

use WowApps\SlackBundle\DTO\Attachment;
use WowApps\SlackBundle\DTO\AttachmentAction;
use WowApps\SlackBundle\Exception\SlackbotException;
use WowApps\SlackBundle\Service\SlackMessageValidator;
use WowApps\SlackBundle\Tests\TestCase;

class SlackMessageValidatorTest extends TestCase
{
    public function testEmptyUsername()
    {
        $this->slackMessageMock->setUsername('');
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_EMPTY_USERNAME);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testEmptyChannel()
    {
        $this->slackMessageMock->setChannel('');
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_EMPTY_CHANNEL);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testIconUrl()
    {
        $this->slackMessageMock->setIconUrl($this->randomString());
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_INCORRECT_ICON_URL);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testIconEmoji()
    {
        $this->slackMessageMock->setIconEmoji($this->randomString());
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_INCORRECT_ICON_EMOJI);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testEmptyText()
    {
        $this->slackMessageMock
            ->setText('')
            ->setAttachments([]);

        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_EMPTY_TEXT);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testAttachmentLimit()
    {
        $attacments = [];
        for ($counter = 0; $counter <= SlackMessageValidator::ATTACHMENTS_LIMIT; ++$counter) {
            $attacments[] = new Attachment();
        }

        $this->slackMessageMock->setAttachments($attacments);
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_ATTACHMENT_LIMIT_EXCEEDED);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testWringColor()
    {
        $this->slackMessageMock->getAttachments()[0]->setColor($this->randomString());
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_INCORRECT_COLOR);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testEmptyAuthorNameNotEmptyAuthorLink()
    {
        $this
            ->slackMessageMock
            ->getAttachments()[0]
            ->setAuthorName('')
            ->setAuthorLink($this->randomString());
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_ATTACHMENT_AUTHOR_EMPTY);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testEmptyAuthorNameNotEmptyAuthorIconUrl()
    {
        $this
            ->slackMessageMock
            ->getAttachments()[0]
            ->setAuthorName('')
            ->setAuthorIconUrl($this->randomString());
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_ATTACHMENT_AUTHOR_EMPTY);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testEmptyTitleNotEmptyTitleLink()
    {
        $this
            ->slackMessageMock
            ->getAttachments()[0]
            ->setTitle('')
            ->setTitleLink($this->randomString());
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_ATTACHMENT_TITLE_EMPTY);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testAttachmentActionWrongType()
    {
        $this
            ->slackMessageMock
            ->getAttachments()[0]
            ->getActions()[0]
            ->setType(AttachmentAction::TYPE_SELECT);
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_ACTION_TYPE_NOT_BUTTON);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testAttachmentActionEmptyText()
    {
        $this
            ->slackMessageMock
            ->getAttachments()[0]
            ->getActions()[0]
            ->setText('');
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_ACTION_TEXT_EMPTY);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testAttachmentActionConfirmEmptyText()
    {
        $this
            ->slackMessageMock
            ->getAttachments()[0]
            ->getActions()[0]
            ->getConfirm()
            ->setActive(true)
            ->setText('');
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_ACTION_CONFIRM_TEXT_EMPTY);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }

    public function testAttachmentActionConfirmEmptyTitle()
    {
        $this
            ->slackMessageMock
            ->getAttachments()[0]
            ->getActions()[0]
            ->getConfirm()
            ->setActive(true)
            ->setTitle('');
        $this->expectException(SlackbotException::class);
        $this->expectExceptionCode(SlackbotException::E_ACTION_CONFIRM_TITLE_EMPTY);
        SlackMessageValidator::validateMessage($this->slackMessageMock);

        $this->rollBackSlackMessage();
    }
}
