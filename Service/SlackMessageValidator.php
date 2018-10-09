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
use WowApps\SlackBundle\Exception\SlackbotException;

/**
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 */
class SlackMessageValidator
{
    /**
     * @param SlackMessage $slackMessage
     * @return void
     * @throws SlackbotException
     */
    public function validateMessage(SlackMessage $slackMessage)
    {
        if (!$slackMessage->getText()) {
            throw new SlackbotException(SlackbotException::E_EMPTY_MESSAGE);
        }
    }

    /**
     * @param SlackMessage $slackMessage
     * @return void
     * @throws SlackbotException
     */
    public function validateIconEmoji(SlackMessage $slackMessage)
    {
        if (!empty($slackMessage->getIconEmoji()) && !preg_match('/^\:(.*?)\:$/i', $slackMessage->getIconEmoji())) {
            throw new SlackbotException(SlackbotException::E_INCORRECT_ICON_EMOJI);
        }
    }

    /**
     * @param SlackMessage $slackMessage
     * @param array $config
     * @return SlackMessage
     */
    public function setDefaultsForEmptyFields(SlackMessage $slackMessage, array $config): SlackMessage
    {
        if (!$slackMessage->getIcon()) {
            $slackMessage->setIcon($config['default_icon']);
        }

        if (!$slackMessage->getRecipient()) {
            $slackMessage->setRecipient($config['default_channel']);
        }

        if (!$slackMessage->getSender()) {
            $slackMessage->setSender('SlackBot');
        }

        return $slackMessage;
    }
}
