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

namespace WowApps\SlackBundle\Tests\DTO;

use WowApps\SlackBundle\DTO\SlackMessage;
use WowApps\SlackBundle\Service\SlackEmoji;
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

    /** @var array */
    private $emojies = [];

    public function setUp()
    {
        parent::setUp();

        $reflectionClass = new \ReflectionClass(SlackEmoji::class);
        $this->emojies = array_values($reflectionClass->getConstants());

        $this->testData = [
            'icon_url'         => $this->randomString(),
            'icon_emoji'       => $this->emojies[rand(0, (count($this->emojies) - 1))],
            'text'             => $this->randomString(),
            'quote_type'       => rand(0, 1),
            'quote_title'      => $this->randomString(),
            'quote_title_link' => $this->randomString(),
            'quote_text'       => $this->randomString(),
            'show_quote'       => (bool) rand(0, 1),
            'recipient'        => $this->randomString(),
            'sender'           => $this->randomString(),
        ];

        $this->slackMessageDto = new SlackMessage(
            $this->testData['text'],
            $this->testData['quote_type'],
            $this->testData['quote_title'],
            $this->testData['quote_title_link'],
            $this->testData['quote_text'],
            $this->testData['show_quote'],
            $this->testData['recipient'],
            $this->testData['sender']
        );

        $this->slackMessageDto->setIconUrl($this->testData['icon_url']);
        $this->slackMessageDto->setIconEmoji($this->testData['icon_emoji']);
    }

    public function testGetIconUrl()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getIconUrl());
        $this->assertSame($this->testData['icon_url'], $this->slackMessageDto->getIconUrl());
    }

    public function testSetIconUrl()
    {
        $this->testData['icon_url'] = $this->randomString();
        $this->slackMessageDto->setIconUrl($this->testData['icon_url']);
        $this->assertInternalType('string', $this->slackMessageDto->getIconUrl());
        $this->assertSame($this->testData['icon_url'], $this->slackMessageDto->getIconUrl());
    }

    public function testGetIconEmoji()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getIconEmoji());
        $this->assertSame($this->testData['icon_emoji'], $this->slackMessageDto->getIconEmoji());
    }

    public function testSetIconEmoji()
    {
        $this->testData['icon_emoji'] = $this->emojies[rand(0, (count($this->emojies) - 1))];
        $this->slackMessageDto->setIconEmoji($this->testData['icon_emoji']);
        $this->assertInternalType('string', $this->slackMessageDto->getIconEmoji());
        $this->assertTrue((bool) preg_match('/^\:(.*?)\:$/i', $this->slackMessageDto->getIconEmoji()));
        $this->assertSame($this->testData['icon_emoji'], $this->slackMessageDto->getIconEmoji());
    }

    public function testGetText()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getText());
        $this->assertSame($this->testData['text'], $this->slackMessageDto->getText());
    }

    public function testSetText()
    {
        $this->testData['text'] = $this->randomString();
        $this->slackMessageDto->setText($this->testData['text']);
        $this->assertInternalType('string', $this->slackMessageDto->getText());
        $this->assertSame($this->testData['text'], $this->slackMessageDto->getText());
    }

    public function testGetQuoteType()
    {
        $this->assertInternalType('int', $this->slackMessageDto->getQuoteType());
        $this->assertSame($this->testData['quote_type'], $this->slackMessageDto->getQuoteType());
    }

    public function testSetQuoteType()
    {
        $this->testData['quote_type'] = rand(1, 999);
        $this->slackMessageDto->setQuoteType($this->testData['quote_type']);
        $this->assertInternalType('int', $this->slackMessageDto->getQuoteType());
        $this->assertSame($this->testData['quote_type'], $this->slackMessageDto->getQuoteType());
    }

    public function testGetQuoteTitle()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getQuoteTitle());
        $this->assertSame($this->testData['quote_title'], $this->slackMessageDto->getQuoteTitle());
    }

    public function testSetQuoteTitle()
    {
        $this->testData['quote_title'] = $this->randomString();
        $this->slackMessageDto->setQuoteTitle($this->testData['quote_title']);
        $this->assertInternalType('string', $this->slackMessageDto->getQuoteTitle());
        $this->assertSame($this->testData['quote_title'], $this->slackMessageDto->getQuoteTitle());
    }

    public function testGetQuoteTitleLink()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getQuoteTitleLink());
        $this->assertSame($this->testData['quote_title_link'], $this->slackMessageDto->getQuoteTitleLink());
    }

    public function testSetQuoteTitleLink()
    {
        $this->testData['quote_title_link'] = $this->randomString();
        $this->slackMessageDto->setQuoteTitleLink($this->testData['quote_title_link']);
        $this->assertInternalType('string', $this->slackMessageDto->getQuoteTitleLink());
        $this->assertSame($this->testData['quote_title_link'], $this->slackMessageDto->getQuoteTitleLink());
    }

    public function testGetQuoteText()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getQuoteText());
        $this->assertSame($this->testData['quote_text'], $this->slackMessageDto->getQuoteText());
    }

    public function testSetQuoteText()
    {
        $this->testData['quote_text'] = $this->randomString();
        $this->slackMessageDto->setQuoteText($this->testData['quote_text']);
        $this->assertInternalType('string', $this->slackMessageDto->getQuoteText());
        $this->assertSame($this->testData['quote_text'], $this->slackMessageDto->getQuoteText());
    }

    public function testIsShowQuote()
    {
        $this->assertInternalType('bool', $this->slackMessageDto->isShowQuote());
        $this->assertSame($this->testData['show_quote'], $this->slackMessageDto->isShowQuote());
    }

    public function testSetShowQuote()
    {
        $this->testData['show_quote'] = (bool) rand(0, 1);
        $this->slackMessageDto->setShowQuote($this->testData['show_quote']);
        $this->assertInternalType('bool', $this->slackMessageDto->isShowQuote());
        $this->assertSame($this->testData['show_quote'], $this->slackMessageDto->isShowQuote());
    }

    public function testGetRecipient()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getRecipient());
        $this->assertSame($this->testData['recipient'], $this->slackMessageDto->getRecipient());
    }

    public function testSetRecipient()
    {
        $this->testData['recipient'] = $this->randomString();
        $this->slackMessageDto->setRecipient($this->testData['recipient']);
        $this->assertInternalType('string', $this->slackMessageDto->getRecipient());
        $this->assertSame($this->testData['recipient'], $this->slackMessageDto->getRecipient());
    }

    public function testGetSender()
    {
        $this->assertInternalType('string', $this->slackMessageDto->getSender());
        $this->assertSame($this->testData['sender'], $this->slackMessageDto->getSender());
    }

    public function testSetSender()
    {
        $this->testData['sender'] = $this->randomString();
        $this->slackMessageDto->setSender($this->testData['sender']);
        $this->assertInternalType('string', $this->slackMessageDto->getSender());
        $this->assertSame($this->testData['sender'], $this->slackMessageDto->getSender());
    }
}
