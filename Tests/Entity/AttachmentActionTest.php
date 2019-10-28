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

use WowApps\SlackBundle\Entity\AttachmentAction;
use WowApps\SlackBundle\Entity\AttachmentActionConfirm;
use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class AttachmentActionTest.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class AttachmentActionTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testGettersAndSettersExists()
    {
        $classReflection = new \ReflectionClass(AttachmentAction::class);
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

    public function testGetName()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getName()));
        $this->assertSame('', $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getName());
    }

    public function testSetName()
    {
        $this->testData['attachment']['action']['name'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->setName(
            $this->testData['attachment']['action']['name']
        );

        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getName()));
        $this->assertSame(
            $this->testData['attachment']['action']['name'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getName()
        );

        $this->rollBackSlackMessage();
    }

    public function testGetText()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getText()));
        $this->assertSame(
            $this->testData['attachment']['action']['text'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getText()
        );
    }

    public function testSetText()
    {
        $this->testData['attachment']['action']['text'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->setText(
            $this->testData['attachment']['action']['text']
        );
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getText()));
        $this->assertSame(
            $this->testData['attachment']['action']['text'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getText()
        );

        $this->rollBackSlackMessage();
    }

    public function testGetUrl()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getUrl()));
        $this->assertSame(
            $this->testData['attachment']['action']['url'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getUrl()
        );
    }

    public function testSetUrl()
    {
        $this->testData['attachment']['action']['url'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->setUrl(
            $this->testData['attachment']['action']['url']
        );
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getUrl()));
        $this->assertSame(
            $this->testData['attachment']['action']['url'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getUrl()
        );

        $this->rollBackSlackMessage();
    }

    public function testGetStyle()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getStyle()));
        $this->assertSame(
            $this->testData['attachment']['action']['style'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getStyle()
        );
    }

    public function testSetStyle()
    {
        $this->testData['attachment']['action']['style'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->setStyle(
            $this->testData['attachment']['action']['style']
        );
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getStyle()));
        $this->assertSame(
            $this->testData['attachment']['action']['style'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getStyle()
        );

        $this->rollBackSlackMessage();
    }

    public function testGetType()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getType()));
        $this->assertSame(
            AttachmentAction::TYPE_BUTTON,
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getType()
        );
    }

    public function testSetType()
    {
        $this->testData['attachment']['action']['type'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->setType(
            $this->testData['attachment']['action']['type']
        );
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getType()));
        $this->assertSame(
            $this->testData['attachment']['action']['type'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getType()
        );

        $this->rollBackSlackMessage();
    }

    public function testGetConfirm()
    {
        $this->assertInstanceOf(
            AttachmentActionConfirm::class,
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()
        );
    }

    public function testSetConfirm()
    {
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->setConfirm(
            new AttachmentActionConfirm()
        );
        $this->assertInstanceOf(
            AttachmentActionConfirm::class,
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()
        );

        $this->rollBackSlackMessage();
    }

    public function testGetValue()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getValue()));
        $this->assertSame('', $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getValue());
    }

    public function testSetValue()
    {
        $this->testData['attachment']['action']['value'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->setValue(
            $this->testData['attachment']['action']['value']
        );
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getValue()));
        $this->assertSame(
            $this->testData['attachment']['action']['value'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getValue()
        );

        $this->rollBackSlackMessage();
    }
}
