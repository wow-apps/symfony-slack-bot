<?php
/**
 * This file is part of the WoW-Apps/Symfony-Slack-Bot bundle for Symfony 3
 * https://github.com/wow-apps/symfony-slack-bot
 *
 * (c) 2018 WoW-Apps
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WowApps\SlackBundle\Tests\Service;

use WowApps\SlackBundle\DTO\SlackMessage;
use WowApps\SlackBundle\Exception\SlackbotException;
use WowApps\SlackBundle\Service\SlackMessageValidator;
use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class SlackMessageValidatorTest
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 */
class SlackMessageValidatorTest extends TestCase
{
    /** @var SlackMessage */
    private $slackMessageDto;

    /** @var SlackMessageValidator */
    private $slackMessageValidator;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();

        $this->slackMessageValidator = new SlackMessageValidator();

        $this->slackMessageDto = new SlackMessage(
            $this->randomString(),
            $this->randomString(),
            rand(0, 1),
            $this->randomString(),
            $this->randomString(),
            $this->randomString(),
            (bool) rand(0, 1),
            $this->randomString(),
            $this->randomString()
        );
    }

    public function testValidateMessage()
    {
        $this->slackMessageDto->setText('');

        $this->expectException(SlackbotException::class);
        $this->slackMessageValidator->validateMessage($this->slackMessageDto);

        $this->slackMessageDto->setText($this->randomString()); // roll back text for DTO
    }
}
