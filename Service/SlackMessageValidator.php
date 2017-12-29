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
use WowApps\SlackBundle\Exception\PackagistException;

/**
 * Class SlackMessageValidator
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 */
class SlackMessageValidator
{
    /**
     * Validate fields
     *
     * @param SlackMessage $slackMessage
     * @return void
     */
    public function validateMessage(SlackMessage $slackMessage)
    {
        if (!$slackMessage->getText()) {
            throw new PackagistException(PackagistException::E_EMPTY_MESSAGE);
        }
    }

    /**
     * Setting default values for empty fields
     *
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
