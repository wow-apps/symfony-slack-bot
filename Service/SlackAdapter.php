<?php
/**
 * This file is part of the WoW-Apps/Symfony-Slack-Bot bundle for Symfony 3
 * https://github.com/wow-apps/symfony-slack-bot
 *
 * (c) 2016 WoW-Apps
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WowApps\SlackBundle\Service;

use WowApps\SlackBundle\DTO\SlackMessage;

/**
 * Class SlackAdapter
 * @package WowApps\SlackBundle\Service
 */
class SlackAdapter
{
    const DEFAULT_MARKDOWN_ENABLED = true;
    const DEFAULT_BOT_AS_USER = false;

    /** @var array */
    private $config;

    /** @var SlackMessageValidator */
    private $validator;

    /**
     * SlackAdapter constructor.
     *
     * @param SlackMessageValidator $messageValidator
     */
    public function __construct(SlackMessageValidator $messageValidator)
    {
        $this->validator = $messageValidator;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param SlackMessage $slackMessage
     * @return string
     */
    public function buildRequestBody(SlackMessage $slackMessage): string
    {
        $slackMessage = $this->setDefaultsForRequiredEmptyFields($slackMessage);
        $this->validator->validateMessage($slackMessage);

        $message = $this->getMessageBody($slackMessage);

        $messageIcon = $this->getMessageIcon($slackMessage);
        if (!empty($messageIcon)) {
            $message = array_merge($message, $messageIcon);
        }

        if ($slackMessage->isShowQuote()) {
            $messageAttachments = $this->getMessageAttachments($slackMessage);
            $message = array_merge($message, $messageAttachments);
        }

        return json_encode($message, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * @param SlackMessage $slackMessage
     * @return array
     */
    private function getMessageBody(SlackMessage $slackMessage): array
    {
        return [
            'text'    => $slackMessage->getText(),
            'channel' => $slackMessage->getRecipient(),
            'mrkdwn'  => self::DEFAULT_MARKDOWN_ENABLED,
            'as_user' => self::DEFAULT_BOT_AS_USER,
        ];
    }

    /**
     * @param SlackMessage $slackMessage
     * @return array
     */
    private function getMessageIcon(SlackMessage $slackMessage): array
    {
        if (!empty($slackMessage->getIconUrl())) {
            return ['icon_url' => $slackMessage->getIconUrl()];
        }

        if (empty($slackMessage->getIconUrl()) && !empty($slackMessage->getIconEmoji())) {
            $this->validator->validateIconEmoji($slackMessage);
            return ['icon_emoji' => $slackMessage->getIconEmoji()];
        }

        return [];
    }

    /**
     * @param SlackMessage $slackMessage
     * @return array
     */
    private function getMessageAttachments(SlackMessage $slackMessage): array
    {
        $return['attachments'] = [
            'fallback' => $slackMessage->getText(),
            'pretext' => $slackMessage->getText(),
            'fields' => [
                'title' => (!$slackMessage->getQuoteTitle() ? '' : $slackMessage->getQuoteTitle()),
                'title_link' => (!$slackMessage->getQuoteTitleLink() ? '' : $slackMessage->getQuoteTitleLink()),
                'text' => (!$slackMessage->getQuoteText() ? '' : $slackMessage->getQuoteText()),
                'color' => $this->quoteTypeColor($slackMessage->getQuoteType()),
                'mrkdwn_in' => ['text', 'pretext']
            ]
        ];
    }

    /**
     * @param SlackMessage $slackMessage
     * @return SlackMessage
     */
    private function setDefaultsForRequiredEmptyFields(SlackMessage $slackMessage): SlackMessage
    {
        // TODO: replace icon on iconUrl
//        if (!$slackMessage->getIcon()) {
//            $slackMessage->setIcon($config['default_icon']);
//        }

        if (!$slackMessage->getRecipient()) {
            $slackMessage->setRecipient($this->config['default_channel']);
        }

        if (!$slackMessage->getSender()) {
            $slackMessage->setSender('SlackBot');
        }

        return $slackMessage;
    }
}
