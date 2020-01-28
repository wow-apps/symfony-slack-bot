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

namespace WowApps\SlackBundle\Tests\Entity;

use WowApps\SlackBundle\Entity\AttachmentField;
use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class AttachmentFieldTest.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class AttachmentFieldTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testGettersAndSettersExists()
    {
        $classReflection = new \ReflectionClass(AttachmentField::class);
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

    public function testGetTitle()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getFields()[0]->getTitle()));
        $this->assertSame(
            $this->testData['attachment']['field']['title'],
            $this->slackMessageMock->getAttachments()[0]->getFields()[0]->getTitle()
        );
    }

    public function testSetUsername()
    {
        $this->testData['attachment']['field']['title'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getFields()[0]->setTitle(
            $this->testData['attachment']['field']['title']
        );
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getFields()[0]->getTitle()));
        $this->assertSame(
            $this->testData['attachment']['field']['title'],
            $this->slackMessageMock->getAttachments()[0]->getFields()[0]->getTitle()
        );

        $this->rollBackSlackMessage();
    }

    public function testGetValue()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getFields()[0]->getValue()));
        $this->assertSame(
            $this->testData['attachment']['field']['value'],
            $this->slackMessageMock->getAttachments()[0]->getFields()[0]->getValue()
        );
    }

    public function testSetValue()
    {
        $this->testData['attachment']['field']['value'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getFields()[0]->setValue(
            $this->testData['attachment']['field']['value']
        );
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getFields()[0]->getValue()));
        $this->assertSame(
            $this->testData['attachment']['field']['value'],
            $this->slackMessageMock->getAttachments()[0]->getFields()[0]->getValue()
        );

        $this->rollBackSlackMessage();
    }

    public function testIsShort()
    {
        $this->assertTrue(is_bool($this->slackMessageMock->getAttachments()[0]->getFields()[0]->isShort()));
        $this->assertSame(
            $this->testData['attachment']['field']['short'],
            $this->slackMessageMock->getAttachments()[0]->getFields()[0]->isShort()
        );
    }

    public function testSetShort()
    {
        $this->testData['attachment']['field']['short'] = $this->randomBoolean();
        $this->slackMessageMock->getAttachments()[0]->getFields()[0]->setShort(
            $this->testData['attachment']['field']['short']
        );
        $this->assertTrue(is_bool($this->slackMessageMock->getAttachments()[0]->getFields()[0]->isShort()));
        $this->assertSame(
            $this->testData['attachment']['field']['short'],
            $this->slackMessageMock->getAttachments()[0]->getFields()[0]->isShort()
        );

        $this->rollBackSlackMessage();
    }
}
