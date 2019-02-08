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

namespace WowApps\SlackBundle\Tests\DTO;

use WowApps\SlackBundle\DTO\AttachmentActionConfirm;
use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class AttachmentActionConfirmTest.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class AttachmentActionConfirmTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testGettersAndSettersExists()
    {
        $classReflection = new \ReflectionClass(AttachmentActionConfirm::class);
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

    public function testIsActive()
    {
        $this->assertTrue(
            is_bool($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->isActive())
        );
        $this->assertSame(
            $this->testData['attachment']['action']['confirm']['active'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->isActive()
        );
    }

    public function testSetShort()
    {
        $this->testData['attachment']['action']['confirm']['active'] = $this->randomBoolean();
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->setActive(
            $this->testData['attachment']['action']['confirm']['active']
        );
        $this->assertTrue(
            is_bool($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->isActive())
        );
        $this->assertSame(
            $this->testData['attachment']['action']['confirm']['active'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->isActive()
        );

        $this->rollBackSlackMessage();
    }

    public function testGetTitle()
    {
        $this->assertTrue(
            is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getTitle())
        );
        $this->assertSame(
            $this->testData['attachment']['action']['confirm']['title'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getTitle()
        );
    }

    public function testSetValue()
    {
        $this->testData['attachment']['action']['confirm']['title'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->setTitle(
            $this->testData['attachment']['action']['confirm']['title']
        );
        $this->assertTrue(
            is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getTitle())
        );
        $this->assertSame(
            $this->testData['attachment']['action']['confirm']['title'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getTitle()
        );

        $this->rollBackSlackMessage();
    }

    public function testGetText()
    {
        $this->assertTrue(
            is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getText())
        );
        $this->assertSame(
            $this->testData['attachment']['action']['confirm']['text'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getText()
        );
    }

    public function testSetText()
    {
        $this->testData['attachment']['action']['confirm']['text'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->setText(
            $this->testData['attachment']['action']['confirm']['text']
        );
        $this->assertTrue(
            is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getText())
        );
        $this->assertSame(
            $this->testData['attachment']['action']['confirm']['text'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getText()
        );

        $this->rollBackSlackMessage();
    }

    public function testGetButtonOkText()
    {
        $this->assertTrue(
            is_string(
                $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getButtonOkText()
            )
        );
        $this->assertSame(
            $this->testData['attachment']['action']['confirm']['button_ok'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getButtonOkText()
        );
    }

    public function testSetButtonOkText()
    {
        $this->testData['attachment']['action']['confirm']['button_ok'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->setButtonOkText(
            $this->testData['attachment']['action']['confirm']['button_ok']
        );
        $this->assertTrue(
            is_string($this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getButtonOkText())
        );
        $this->assertSame(
            $this->testData['attachment']['action']['confirm']['button_ok'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getButtonOkText()
        );

        $this->rollBackSlackMessage();
    }

    public function testGetButtonDismissText()
    {
        $this->assertTrue(
            is_string(
                $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getButtonDismissText()
            )
        );
        $this->assertSame(
            $this->testData['attachment']['action']['confirm']['button_dismiss'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getButtonDismissText()
        );
    }

    public function testSetButtonDismissText()
    {
        $this->testData['attachment']['action']['confirm']['button_dismiss'] = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->setButtonDismissText(
            $this->testData['attachment']['action']['confirm']['button_dismiss']
        );
        $this->assertTrue(
            is_string(
                $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getButtonDismissText()
            )
        );
        $this->assertSame(
            $this->testData['attachment']['action']['confirm']['button_dismiss'],
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]->getConfirm()->getButtonDismissText()
        );

        $this->rollBackSlackMessage();
    }
}
