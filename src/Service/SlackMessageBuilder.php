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

namespace WowApps\SlackBundle\Service;

use WowApps\SlackBundle\Entity\Attachment;
use WowApps\SlackBundle\Entity\AttachmentAction;
use WowApps\SlackBundle\Entity\AttachmentField;
use WowApps\SlackBundle\Entity\SlackMessage;
use WowApps\SlackBundle\Exception\SlackbotException;

/**
 * Class SlackAdapter.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackMessageBuilder
{
    /** @var array */
    private $config;

    /** @var SlackColor */
    private $color;

    /** @var SlackMessage */
    private $slackMessage;

    /** @var array */
    private $requestBody;

    /**
     * SlackAdapter constructor.
     *
     * @param array      $config
     * @param SlackColor $slackColor
     */
    public function __construct(array $config, SlackColor $slackColor)
    {
        $this->config = $config;
        $this->color = $slackColor;
    }

    /**
     * @param SlackMessage $slackMessage
     *
     * @return string
     *
     * @throws SlackbotException
     */
    public function buildRequestBody(SlackMessage $slackMessage): string
    {
        $this->requestBody = [];

        $this->slackMessage = $slackMessage;

        $this->setDefaults();

        SlackMessageValidator::validateMessage($this->slackMessage);

        $json = json_encode(
            $this->buildJsonFromDto(),
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );

        if (!$json) {
            throw new SlackbotException(SlackbotException::E_CONVERT_MESSAGE_TO_JSON);
        }

        return $json;
    }

    private function setDefaults()
    {
        if (empty($this->slackMessage->getUsername())) {
            $this->slackMessage->setUsername($this->config['default_username']);
        }

        if (empty($this->slackMessage->getChannel())
            || !array_key_exists($this->slackMessage->getChannel(), $this->config['channels'])
        ) {
            $this->slackMessage->setChannel('');
        }

        if (empty($this->slackMessage->getIconUrl()) && empty($this->slackMessage->getIconEmoji())) {
            $this->slackMessage->setIconUrl($this->config['default_icon_url']);
        }
    }

    /**
     * @return array
     */
    private function buildJsonFromDto(): array
    {
        $this->getSimpleMessage();

        $this->getMessageIcon();

        if (!empty($this->slackMessage->getAttachments())) {
            foreach ($this->slackMessage->getAttachments() as $attachment) {
                $this->getAttachment(
                    $this->setAttachmentDefaults($attachment)
                );
            }
        }

        return $this->requestBody;
    }

    private function getSimpleMessage()
    {
        $this->requestBody = [
            'username' => $this->slackMessage->getUsername(),
            'channel' => $this->slackMessage->getChannel(),
            'mrkdwn' => $this->slackMessage->isMarkdown(),
            'text' => $this->slackMessage->getText(),
        ];
    }

    private function getMessageIcon()
    {
        if (!empty($this->slackMessage->getIconUrl())) {
            $this->requestBody['icon_url'] = $this->slackMessage->getIconUrl();

            return;
        }

        if (!empty($this->slackMessage->getIconEmoji())) {
            $this->requestBody['icon_emoji'] = $this->slackMessage->getIconEmoji();
        }
    }

    /**
     * @param Attachment $attachment
     *
     * @return Attachment
     */
    private function setAttachmentDefaults(Attachment $attachment): Attachment
    {
        if (empty($attachment->getColor())) {
            $attachment->setColor(SlackColor::COLOR_DEFAULT);
        }

        if (empty($attachment->getFallback())) {
            $attachment->setFallback($this->config['default_fallback']);
        }

        return $attachment;
    }

    /**
     * @param Attachment $attachment
     */
    private function getAttachment(Attachment $attachment)
    {
        $attachmentArray = [
            'color' => $this->color->getHex($attachment->getColor()),
            'fallback' => $attachment->getFallback(),
            'pretext' => $attachment->getPretext(),
            'author_name' => $attachment->getAuthorName(),
            'author_link' => $attachment->getAuthorLink(),
            'author_icon' => $attachment->getAuthorIconUrl(),
            'title' => $attachment->getTitle(),
            'title_link' => $attachment->getTitleLink(),
            'text' => $attachment->getText(),
            'image_url' => $attachment->getImageUrl(),
            'thumb_url' => $attachment->getThumbUrl(),
            'footer' => $attachment->getFooter(),
            'footer_icon' => $attachment->getFooterIconUrl(),
            'ts' => $attachment->getTimestamp(),
            'fields' => empty($attachment->getFields()) ? [] : $this->getFields($attachment->getFields()),
            'actions' => empty($attachment->getActions()) ? [] : $this->getActions($attachment->getActions()),
        ];

        if (!empty($attachmentArray)) {
            $this->requestBody['attachments'][] = $this->removeEmptyItems($attachmentArray);
        }
    }

    /**
     * @param AttachmentAction[] $actions
     *
     * @return array
     */
    private function getActions(array $actions): array
    {
        $actionsArray = [];
        foreach ($actions as $action) {
            $actionArray = [
                'name' => $action->getName(),
                'text' => $action->getText(),
                'url' => $action->getUrl(),
                'style' => $action->getStyle(),
                'type' => $action->getType(),
                'value' => $action->getValue(),
            ];

            if ($action->getConfirm()->isActive()) {
                $confirm = [
                    'title' => $action->getConfirm()->getTitle(),
                    'text' => $action->getConfirm()->getText(),
                    'ok_text' => $action->getConfirm()->getButtonOkText(),
                    'dismiss_text' => $action->getConfirm()->getButtonDismissText(),
                ];

                $actionArray['confirm'] = $this->removeEmptyItems($confirm);
            }

            $actionsArray[] = $this->removeEmptyItems($actionArray);
        }

        return $actionsArray;
    }

    /**
     * @param AttachmentField[] $fields
     *
     * @return array
     */
    private function getFields(array $fields): array
    {
        $fieldsArray = [];
        foreach ($fields as $field) {
            $fieldArray = [
                'title' => $field->getTitle(),
                'value' => $field->getValue(),
                'short' => $field->isShort(),
            ];

            $fieldsArray[] = $this->removeEmptyItems($fieldArray);
        }

        return $fieldsArray;
    }

    /**
     * @param array $array
     *
     * @return array
     */
    private function removeEmptyItems(array $array): array
    {
        foreach ($array as $key => $value) {
            if (!is_bool($value) && empty($value)) {
                unset($array[$key]);
            }
        }

        return $array;
    }
}
