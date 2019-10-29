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

namespace WowApps\SlackBundle\Service;

use WowApps\SlackBundle\DTO\Attachment;
use WowApps\SlackBundle\DTO\AttachmentAction;
use WowApps\SlackBundle\DTO\AttachmentActionConfirm;
use WowApps\SlackBundle\DTO\SlackMessage;
use WowApps\SlackBundle\Exception\SlackbotException;
use WowApps\SlackBundle\Tests\Service\SlackEmojiTest;

/**
 * Class SlackMessageValidator.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackMessageValidator
{
    const ATTACHMENTS_LIMIT = 20;

    /**
     * @param SlackMessage $message
     *
     * @throws SlackbotException
     */
    public static function validateMessage(SlackMessage $message)
    {
        self::slackMessageDto($message);
    }

    /**
     * @param SlackMessage $message
     *
     * @throws SlackbotException
     */
    private static function slackMessageDto(SlackMessage $message)
    {
        if (empty($message->getUsername())) {
            throw new SlackbotException(SlackbotException::E_EMPTY_USERNAME);
        }

        self::checkIcon($message);

        if (empty($message->getText()) && empty($message->getAttachments())) {
            throw new SlackbotException(SlackbotException::E_EMPTY_TEXT);
        }

        self::checkAttachments($message);
    }

    /**
     * @param SlackMessage $message
     *
     * @throws SlackbotException
     */
    private static function checkIcon(SlackMessage $message)
    {
        if (!empty($message->getIconUrl())) {
            if (!preg_match(
                '/^(?:http|https|ftp)\:\/\/(.*?)\.(.*?)\/(.*?)\.(?:jpg|jpeg|png)/i',
                $message->getIconUrl()
            )) {
                throw new SlackbotException(SlackbotException::E_INCORRECT_ICON_URL);
            }
        }

        if (!empty($message->getIconEmoji())) {
            if (!preg_match(SlackEmojiTest::EMOJI_FORMAT_PATTERN, $message->getIconEmoji())) {
                throw new SlackbotException(SlackbotException::E_INCORRECT_ICON_EMOJI);
            }
        }
    }

    private static function checkAttachments(SlackMessage $message)
    {
        if (count($message->getAttachments()) > self::ATTACHMENTS_LIMIT) {
            throw new SlackbotException(
                SlackbotException::E_ATTACHMENT_LIMIT_EXCEEDED,
                ['max_attachments_allowed' => self::ATTACHMENTS_LIMIT]
            );
        }

        if (!empty($message->getAttachments())) {
            foreach ($message->getAttachments() as $attachment) {
                self::attachmentDto($attachment);
            }
        }
    }

    /**
     * @param Attachment $attachment
     *
     * @throws SlackbotException
     */
    private static function attachmentDto(Attachment $attachment)
    {
        if (!in_array($attachment->getColor(), SlackColor::COLOR_MAP)) {
            throw new SlackbotException(SlackbotException::E_INCORRECT_COLOR);
        }

        if (empty($attachment->getAuthorName())
            && (!empty($attachment->getAuthorLink()) || !empty($attachment->getAuthorIconUrl()))
        ) {
            throw new SlackbotException(SlackbotException::E_ATTACHMENT_AUTHOR_EMPTY);
        }

        if (empty($attachment->getTitle()) && !empty($attachment->getTitleLink())) {
            throw new SlackbotException(SlackbotException::E_ATTACHMENT_TITLE_EMPTY);
        }

        foreach ($attachment->getActions() as $action) {
            self::checkAttachmentAction($action);
        }
    }

    /**
     * @param AttachmentAction $action
     *
     * @throws SlackbotException
     */
    private static function checkAttachmentAction(AttachmentAction $action)
    {
        if (AttachmentAction::TYPE_BUTTON !== $action->getType()) {
            throw new SlackbotException(SlackbotException::E_ACTION_TYPE_NOT_BUTTON);
        }

        if (empty($action->getText())) {
            throw new SlackbotException(SlackbotException::E_ACTION_TEXT_EMPTY);
        }

        if ($action->getConfirm()->isActive()) {
            self::attachmentActionConfirm($action->getConfirm());
        }
    }

    /**
     * @param AttachmentActionConfirm $actionConfirm
     *
     * @throws SlackbotException
     */
    private static function attachmentActionConfirm(AttachmentActionConfirm $actionConfirm)
    {
        if (empty($actionConfirm->getTitle())) {
            throw new SlackbotException(SlackbotException::E_ACTION_CONFIRM_TITLE_EMPTY);
        }

        if (empty($actionConfirm->getText())) {
            throw new SlackbotException(SlackbotException::E_ACTION_CONFIRM_TEXT_EMPTY);
        }
    }
}
