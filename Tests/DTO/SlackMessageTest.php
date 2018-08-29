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

namespace WowApps\SlackBundle\Tests\DTO;

use WowApps\SlackBundle\DTO\SlackMessage;
use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class SlackMessageTest
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 */
class SlackMessageTest extends TestCase
{
    /** @var array */
    private $testData = [];

    /** @var SlackMessage */
    private $slackMessageDto;

    public function setUp()
    {
        parent::setUp();

        $this->testData = [
            'icon'             => $this->randomString(),
            'text'             => $this->randomString(),
            'quote_type'       => rand(0, 1),
            'quote_title'      => $this->randomString(),
            'quote_title_link' => $this->randomString(),
            'quote_text'       => $this->randomString(),
            'show_quote'       => (bool)rand(0, 1),
            'recipient'        => $this->randomString(),
            'sender'           => $this->randomString(),
        ];

        $this->slackMessageDto = new SlackMessage(
            $this->testData['icon'],
            $this->testData['text'],
            $this->testData['quote_type'],
            $this->testData['quote_title'],
            $this->testData['quote_title_link'],
            $this->testData['quote_text'],
            $this->testData['show_quote'],
            $this->testData['recipient'],
            $this->testData['sender']
        );
    }

    public function testGetIcon()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getIcon());
        $this->assertSame($this->testData['icon'], $this->slackMessageDto->getIcon());
    }

    public function testGetText()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getText());
        $this->assertSame($this->testData['text'], $this->slackMessageDto->getText());
    }

    public function testGetQuoteType()
    {
        $this->assertInternalType('int', $this->slackMessageDto->getQuoteType());
        $this->assertSame($this->testData['quote_type'], $this->slackMessageDto->getQuoteType());
    }

    public function testGetQuoteTitle()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getQuoteTitle());
        $this->assertSame($this->testData['quote_title'], $this->slackMessageDto->getQuoteTitle());
    }

    public function testGetQuoteTitleLink()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getQuoteTitleLink());
        $this->assertSame($this->testData['quote_title_link'], $this->slackMessageDto->getQuoteTitleLink());
    }

    public function testGetQuoteText()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getQuoteText());
        $this->assertSame($this->testData['quote_text'], $this->slackMessageDto->getQuoteText());
    }

    public function testIsShowQuote()
    {
        $this->assertInternalType('bool', $this->slackMessageDto->isShowQuote());
        $this->assertSame($this->testData['show_quote'], $this->slackMessageDto->isShowQuote());
    }

    public function testGetRecipient()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getRecipient());
        $this->assertSame($this->testData['recipient'], $this->slackMessageDto->getRecipient());
    }

    public function testGetSender()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getSender());
        $this->assertSame($this->testData['sender'], $this->slackMessageDto->getSender());
    }
}
