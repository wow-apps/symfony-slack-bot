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

namespace WowApps\SlackBundle\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use WowApps\SlackBundle\Entity\Attachment;
use WowApps\SlackBundle\Entity\AttachmentAction;
use WowApps\SlackBundle\Entity\AttachmentActionConfirm;
use WowApps\SlackBundle\Entity\AttachmentField;
use WowApps\SlackBundle\Entity\SlackMessage;
use WowApps\SlackBundle\Service\SlackEmoji;
use WowApps\SlackBundle\Service\SlackColor;

/**
 * Class TestCase.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
abstract class TestCase extends PHPUnitTestCase
{
    const ARRAY_MIN_ITEMS = 2;
    const ARRAY_MAX_ITEMS = 10;

    /** @var SlackMessage */
    protected $slackMessageMock;

    /** @var array */
    protected $testData;

    /** @var array */
    protected $emojies;

    protected function setUp()
    {
        $reflectionClass = new \ReflectionClass(SlackEmoji::class);
        $this->emojies = array_values($reflectionClass->getConstants());

        $this->testData = [
            'user_name' => $this->randomString(),
            'channel' => $this->randomString(),
            'icon_url' => 'https://' . $this->randomString() . '.com/img.png',
            'icon_emoji' => $this->emojies[rand(0, (count($this->emojies) - 1))],
            'text' => $this->randomString(),
            'markdown' => $this->randomBoolean(),
            'attachment' => [
                'color' => SlackColor::COLOR_MAP[rand(0, (count(SlackColor::COLOR_MAP) - 1))],
                'pretext' => $this->randomString(),
                'author_name' => $this->randomString(),
                'author_link' => $this->randomString(),
                'author_icon_url' => $this->randomString(),
                'title' => $this->randomString(),
                'title_link' => $this->randomString(),
                'text' => $this->randomString(),
                'image_url' => $this->randomString(),
                'thumb_url' => $this->randomString(),
                'footer' => $this->randomString(),
                'footer_icon_url' => $this->randomString(),
                'fallback' => $this->randomString(),
                'timestamp' => time(),
                'field' => [
                    'title' => $this->randomString(),
                    'value' => $this->randomString(),
                    'short' => $this->randomBoolean(),
                ],
                'action' => [
                    'name' => $this->randomString(),
                    'text' => $this->randomString(),
                    'url' => $this->randomString(),
                    'style' => AttachmentAction::STYLE_PRIMARY,
                    'type' => AttachmentAction::TYPE_BUTTON,
                    'confirm' => [
                        'active' => $this->randomBoolean(),
                        'title' => $this->randomString(),
                        'text' => $this->randomString(),
                        'button_ok' => $this->randomString(),
                        'button_dismiss' => $this->randomString(),
                    ],
                ],
            ],
        ];

        $this->rollBackSlackMessage();

        parent::setUp();
    }

    /**
     * Create a random string.
     *
     * @param int $length the length of the string to create
     *
     * @return string
     *
     * @author XEWeb <https://www.xeweb.net/>
     */
    protected function randomString(int $length = 6): string
    {
        $str = '';
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; ++$i) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }

        return $str;
    }

    /**
     * @return bool
     */
    protected function randomBoolean(): bool
    {
        return (bool) rand(0, 1);
    }

    protected function rollBackSlackMessage()
    {
        $this->slackMessageMock = new SlackMessage(
            $this->testData['text'],
            $this->testData['user_name'],
            $this->testData['channel'],
            $this->testData['icon_url'],
            $this->testData['icon_emoji'],
            $this->testData['markdown'],
            [
                new Attachment(
                    $this->testData['attachment']['color'],
                    $this->testData['attachment']['pretext'],
                    $this->testData['attachment']['author_name'],
                    $this->testData['attachment']['author_link'],
                    $this->testData['attachment']['author_icon_url'],
                    $this->testData['attachment']['title'],
                    $this->testData['attachment']['title_link'],
                    $this->testData['attachment']['text'],
                    $this->testData['attachment']['image_url'],
                    $this->testData['attachment']['thumb_url'],
                    $this->testData['attachment']['footer'],
                    $this->testData['attachment']['footer_icon_url'],
                    $this->testData['attachment']['fallback'],
                    $this->testData['attachment']['timestamp'],
                    [
                        new AttachmentField(
                            $this->testData['attachment']['field']['title'],
                            $this->testData['attachment']['field']['value'],
                            $this->testData['attachment']['field']['short']
                        ),
                    ],
                    [
                        new AttachmentAction(
                            $this->testData['attachment']['action']['text'],
                            $this->testData['attachment']['action']['url'],
                            $this->testData['attachment']['action']['style'],
                            new AttachmentActionConfirm(
                                $this->testData['attachment']['action']['confirm']['active'],
                                $this->testData['attachment']['action']['confirm']['title'],
                                $this->testData['attachment']['action']['confirm']['text'],
                                $this->testData['attachment']['action']['confirm']['button_ok'],
                                $this->testData['attachment']['action']['confirm']['button_dismiss']
                            )
                        ),
                    ]
                ),
            ]
        );
    }
}
