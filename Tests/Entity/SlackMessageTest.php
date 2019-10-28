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

namespace WowApps\SlackBundle\Tests\Entity;

use WowApps\SlackBundle\Entity\Attachment;
use WowApps\SlackBundle\Entity\SlackMessage;
use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class SlackMessageTest.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackMessageTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testGettersAndSettersExists()
    {
        $classReflection = new \ReflectionClass(SlackMessage::class);
        $classProperties = $classReflection->getProperties(\ReflectionProperty::IS_PRIVATE);
        $classMethods = $classReflection->getMethods(\ReflectionMethod::IS_PUBLIC);
        $classMethodsName = [];

        foreach ($classMethods as $classMethod) {
            if (preg_match('/^\_\_/i', $classMethod->getName())) {
                continue;
            }

            $classMethodsName[] = $classMethod->getName();
        }

        foreach ($classProperties as $classProperty) {
            $getterMethod = 'get' . ucfirst($classProperty->getName());
            $setterMethod = 'set' . ucfirst($classProperty->getName());

            if (preg_match('/\@var bool/im', $classProperty->getDocComment())) {
                $getterMethod = 'is' . ucfirst($classProperty->getName());
            }

            $this->assertTrue(in_array($getterMethod, $classMethodsName));
            $this->assertTrue(in_array($setterMethod, $classMethodsName));
        }
    }

    public function testGetUsername()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getUsername()));
        $this->assertSame($this->testData['user_name'], $this->slackMessageMock->getUsername());
    }

    public function testSetUsername()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->setUsername($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getUsername()));
        $this->assertSame($newData, $this->slackMessageMock->getUsername());

        $this->rollBackSlackMessage();
    }

    public function testGetChannel()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getChannel()));
        $this->assertSame($this->testData['channel'], $this->slackMessageMock->getChannel());
    }

    public function testSetChannel()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->setChannel($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getChannel()));
        $this->assertSame($newData, $this->slackMessageMock->getChannel());

        $this->rollBackSlackMessage();
    }

    public function testGetIconUrl()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getIconUrl()));
        $this->assertSame($this->testData['icon_url'], $this->slackMessageMock->getIconUrl());
    }

    public function testSetIconUrl()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->setIconUrl($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getIconUrl()));
        $this->assertSame($newData, $this->slackMessageMock->getIconUrl());

        $this->rollBackSlackMessage();
    }

    public function testGetIconEmoji()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getIconEmoji()));
        $this->assertSame($this->testData['icon_emoji'], $this->slackMessageMock->getIconEmoji());
    }

    public function testSetIconEmoji()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->setIconEmoji($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getIconEmoji()));
        $this->assertSame($newData, $this->slackMessageMock->getIconEmoji());

        $this->rollBackSlackMessage();
    }

    public function testIsMarkdown()
    {
        $this->assertTrue(is_bool($this->slackMessageMock->isMarkdown()));
        $this->assertSame($this->testData['markdown'], $this->slackMessageMock->isMarkdown());
    }

    public function testSetMarkdown()
    {
        $newData = $this->randomBoolean();
        $this->slackMessageMock->setMarkdown($newData);
        $this->assertTrue(is_bool($this->slackMessageMock->isMarkdown()));
        $this->assertSame($newData, $this->slackMessageMock->isMarkdown());

        $this->rollBackSlackMessage();
    }

    public function testGetText()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getText()));
        $this->assertSame($this->testData['text'], $this->slackMessageMock->getText());
    }

    public function testSetText()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->setText($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getText()));
        $this->assertSame($newData, $this->slackMessageMock->getText());

        $this->rollBackSlackMessage();
    }

    public function testGetAttachments()
    {
        $this->assertTrue(is_array($this->slackMessageMock->getAttachments()));
        $this->assertTrue(1 === count($this->slackMessageMock->getAttachments()));
    }

    public function testSetAttachments()
    {
        $newData = [new Attachment()];
        $this->slackMessageMock->setAttachments($newData);
        $this->assertTrue(is_array($this->slackMessageMock->getAttachments()));
        $this->assertTrue(1 === count($this->slackMessageMock->getAttachments()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments());

        $this->rollBackSlackMessage();
    }

    public function testAppendAttachments()
    {
        $newData = $this->slackMessageMock->getAttachments();
        $attachment = new Attachment();
        $newData[] = $attachment;
        $this->slackMessageMock->appendAttachment($attachment);
        $this->assertTrue(is_array($this->slackMessageMock->getAttachments()));
        $this->assertTrue(count($this->slackMessageMock->getAttachments()) === count($newData));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments());

        $this->rollBackSlackMessage();
    }
}
