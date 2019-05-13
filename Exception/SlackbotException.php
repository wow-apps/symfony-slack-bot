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

namespace WowApps\SlackBundle\Exception;

use Psr\Log\InvalidArgumentException;

/**
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackbotException extends InvalidArgumentException
{
    const E_UNKNOWN = 0;
    const E_EMPTY_USERNAME = 1;
    const E_EMPTY_CHANNEL = 2;
    const E_INCORRECT_ICON_URL = 3;
    const E_INCORRECT_ICON_EMOJI = 4;
    const E_EMPTY_TEXT = 5;
    const E_WRONG_LINES_NUMBER = 6;
    const E_EMPTY_LIST = 7;
    const E_INCORRECT_LIST_TYPE = 8;
    const E_INCORRECT_COLOR = 9;
    const E_MISSING_API_URL = 10;
    const E_BAD_RESPONSE = 11;
    const E_CONVERT_MESSAGE_TO_JSON = 12;
    const E_ATTACHMENT_LIMIT_EXCEEDED = 13;
    const E_ATTACHMENT_AUTHOR_EMPTY = 14;
    const E_ATTACHMENT_TITLE_EMPTY = 15;
    const E_ACTION_TYPE_NOT_BUTTON = 16;
    const E_ACTION_TEXT_EMPTY = 17;
    const E_ACTION_CONFIRM_TITLE_EMPTY = 18;
    const E_ACTION_CONFIRM_TEXT_EMPTY = 19;

    /** @var array */
    private $errorMessages = [
        self::E_UNKNOWN => 'Unknown error',
        self::E_EMPTY_USERNAME => 'Username can\'t be empty.',
        self::E_EMPTY_CHANNEL => 'Channel can\'t be empty.',
        self::E_INCORRECT_ICON_URL => 'Incorrect icon url. Supported files: jpg, jpeg, png.',
        self::E_INCORRECT_ICON_EMOJI => 'Incorrect Emoji icon',
        self::E_EMPTY_TEXT => 'Message text can\'t be empty without attachments',
        self::E_WRONG_LINES_NUMBER => 'Wrong lines number. Allowed minimum value is 1 and maximum is 5',
        self::E_EMPTY_LIST => 'The list must contain at least one value for format',
        self::E_INCORRECT_LIST_TYPE => 'Incorrect list type',
        self::E_INCORRECT_COLOR => 'Incorrect color',
        self::E_MISSING_API_URL => 'Missing API url in SlackbotProvider',
        self::E_BAD_RESPONSE => 'Bad response from Slack server',
        self::E_CONVERT_MESSAGE_TO_JSON => 'An error occurred during making JSON from SlackMessage',
        self::E_ATTACHMENT_LIMIT_EXCEEDED => 'Exceeded the limit of attachments number',
        self::E_ATTACHMENT_AUTHOR_EMPTY => 'Attachment author name can\'t be empty when you set author link or icon',
        self::E_ATTACHMENT_TITLE_EMPTY => 'Attachment title can\'t be empty when you set title link',
        self::E_ACTION_TYPE_NOT_BUTTON => 'Current version of SlackBot supports just \'button\' type for actions',
        self::E_ACTION_TEXT_EMPTY => 'Action text can\'t be empty',
        self::E_ACTION_CONFIRM_TITLE_EMPTY => 'Confirmation title can\'t be empty',
        self::E_ACTION_CONFIRM_TEXT_EMPTY => 'Confirmation text can\'t be empty',
    ];

    /**
     * SlackbotException constructor.
     *
     * @param int   $errorCode
     * @param array $additional
     */
    public function __construct(int $errorCode = 0, array $additional = [])
    {
        if (!array_key_exists($errorCode, $this->errorMessages)) {
            $errorCode = 0;
        }

        $errorMessage = sprintf(
            "[%d] %s\nRead more: %s\n%s",
            $errorCode,
            $this->errorMessages[$errorCode],
            'https://wow-apps.github.io/symfony-slack-bot/docs/#/4x/exceptions/' . $errorCode,
            empty($additional) ? '' : 'Additional: ' . sprintf(' (%s)', implode(', ', $additional))
        );

        parent::__construct($errorMessage, $errorCode);
    }
}
