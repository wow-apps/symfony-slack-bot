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

use WowApps\SlackBundle\Entity\Attachment;
use WowApps\SlackBundle\Entity\AttachmentAction;
use WowApps\SlackBundle\Entity\AttachmentField;
use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class AttachmentTest.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class AttachmentTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testGettersAndSettersExists()
    {
        $classReflection = new \ReflectionClass(Attachment::class);
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

    public function testGetColor()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getColor()));
        $this->assertSame(
            $this->testData['attachment']['color'],
            $this->slackMessageMock->getAttachments()[0]->getColor()
        );
    }

    public function testSetColor()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setColor($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getColor()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getColor());

        $this->rollBackSlackMessage();
    }

    public function testGetPretext()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getPretext()));
        $this->assertSame(
            $this->testData['attachment']['pretext'],
            $this->slackMessageMock->getAttachments()[0]->getPretext()
        );
    }

    public function testSetPretext()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setPretext($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getPretext()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getPretext());

        $this->rollBackSlackMessage();
    }

    public function testGetAuthorName()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getAuthorName()));
        $this->assertSame(
            $this->testData['attachment']['author_name'],
            $this->slackMessageMock->getAttachments()[0]->getAuthorName()
        );
    }

    public function testSetAuthorName()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setAuthorName($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getAuthorName()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getAuthorName());

        $this->rollBackSlackMessage();
    }

    public function testGetAuthorLink()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getAuthorLink()));
        $this->assertSame(
            $this->testData['attachment']['author_link'],
            $this->slackMessageMock->getAttachments()[0]->getAuthorLink()
        );
    }

    public function testSetAuthorLink()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setAuthorLink($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getAuthorLink()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getAuthorLink());

        $this->rollBackSlackMessage();
    }

    public function testGetAuthorIconUrl()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getAuthorIconUrl()));
        $this->assertSame(
            $this->testData['attachment']['author_icon_url'],
            $this->slackMessageMock->getAttachments()[0]->getAuthorIconUrl()
        );
    }

    public function testSetAuthorIconUrl()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setAuthorIconUrl($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getAuthorIconUrl()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getAuthorIconUrl());

        $this->rollBackSlackMessage();
    }

    public function testGetTitle()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getTitle()));
        $this->assertSame(
            $this->testData['attachment']['title'],
            $this->slackMessageMock->getAttachments()[0]->getTitle()
        );
    }

    public function testSetTitle()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setTitle($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getTitle()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getTitle());

        $this->rollBackSlackMessage();
    }

    public function testGetTitleLink()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getTitleLink()));
        $this->assertSame(
            $this->testData['attachment']['title_link'],
            $this->slackMessageMock->getAttachments()[0]->getTitleLink()
        );
    }

    public function testSetTitleLink()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setTitleLink($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getTitleLink()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getTitleLink());

        $this->rollBackSlackMessage();
    }

    public function testGetText()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getText()));
        $this->assertSame(
            $this->testData['attachment']['text'],
            $this->slackMessageMock->getAttachments()[0]->getText()
        );
    }

    public function testSetText()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setText($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getText()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getText());

        $this->rollBackSlackMessage();
    }

    public function testGetImageUrl()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getImageUrl()));
        $this->assertSame(
            $this->testData['attachment']['image_url'],
            $this->slackMessageMock->getAttachments()[0]->getImageUrl()
        );
    }

    public function testSetImageUrl()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setImageUrl($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getImageUrl()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getImageUrl());

        $this->rollBackSlackMessage();
    }

    public function testGetThumbUrl()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getThumbUrl()));
        $this->assertSame(
            $this->testData['attachment']['thumb_url'],
            $this->slackMessageMock->getAttachments()[0]->getThumbUrl()
        );
    }

    public function testSetThumbUrl()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setThumbUrl($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getThumbUrl()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getThumbUrl());

        $this->rollBackSlackMessage();
    }

    public function testGetFooter()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getFooter()));
        $this->assertSame(
            $this->testData['attachment']['footer'],
            $this->slackMessageMock->getAttachments()[0]->getFooter()
        );
    }

    public function testSetFooter()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setFooter($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getFooter()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getFooter());

        $this->rollBackSlackMessage();
    }

    public function testGetFooterIconUrl()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getFooterIconUrl()));
        $this->assertSame(
            $this->testData['attachment']['footer_icon_url'],
            $this->slackMessageMock->getAttachments()[0]->getFooterIconUrl()
        );
    }

    public function testSetFooterIconUrl()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setFooterIconUrl($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getFooterIconUrl()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getFooterIconUrl());

        $this->rollBackSlackMessage();
    }

    public function testGetFallback()
    {
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getFallback()));
        $this->assertSame(
            $this->testData['attachment']['fallback'],
            $this->slackMessageMock->getAttachments()[0]->getFallback()
        );
    }

    public function testSetFallback()
    {
        $newData = $this->randomString();
        $this->slackMessageMock->getAttachments()[0]->setFallback($newData);
        $this->assertTrue(is_string($this->slackMessageMock->getAttachments()[0]->getFallback()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getFallback());

        $this->rollBackSlackMessage();
    }

    public function testGetTimestamp()
    {
        $this->assertTrue(is_int($this->slackMessageMock->getAttachments()[0]->getTimestamp()));
        $this->assertSame(
            $this->testData['attachment']['timestamp'],
            $this->slackMessageMock->getAttachments()[0]->getTimestamp()
        );
    }

    public function testSetTimestamp()
    {
        $newData = time();
        $this->slackMessageMock->getAttachments()[0]->setTimestamp($newData);
        $this->assertTrue(is_int($this->slackMessageMock->getAttachments()[0]->getTimestamp()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getTimestamp());

        $this->rollBackSlackMessage();
    }

    public function testGetFields()
    {
        $this->assertTrue(is_array($this->slackMessageMock->getAttachments()[0]->getFields()));
        $this->assertInstanceOf(
            AttachmentField::class,
            $this->slackMessageMock->getAttachments()[0]->getFields()[0]
        );
    }

    public function testSetFields()
    {
        $newData = [new AttachmentField(), new AttachmentField()];
        $this->slackMessageMock->getAttachments()[0]->setFields($newData);
        $this->assertTrue(is_array($this->slackMessageMock->getAttachments()[0]->getFields()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getFields());

        $this->rollBackSlackMessage();
    }

    public function testAppendField()
    {
        $newData = [new AttachmentField(), new AttachmentField()];
        $this->slackMessageMock->getAttachments()[0]->setFields($newData);
        $newField = new AttachmentField();
        $newData[] = $newField;
        $this->slackMessageMock->getAttachments()[0]->appendField($newField);
        $this->assertTrue(is_array($this->slackMessageMock->getAttachments()[0]->getFields()));
        $this->assertTrue(count($newData) === count($this->slackMessageMock->getAttachments()[0]->getFields()));
        $this->assertTrue(count($newData) === count($this->slackMessageMock->getAttachments()[0]->getFields()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getFields());
        $this->assertInstanceOf(
            AttachmentField::class,
            $this->slackMessageMock->getAttachments()[0]->getFields()[0]
        );

        $this->rollBackSlackMessage();
    }

    public function testGetActions()
    {
        $this->assertTrue(is_array($this->slackMessageMock->getAttachments()[0]->getActions()));
        $this->assertInstanceOf(
            AttachmentAction::class,
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]
        );
    }

    public function testSetActions()
    {
        $newData = [new AttachmentAction(), new AttachmentAction()];
        $this->slackMessageMock->getAttachments()[0]->setActions($newData);
        $this->assertTrue(is_array($this->slackMessageMock->getAttachments()[0]->getActions()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getActions());
        $this->assertInstanceOf(
            AttachmentAction::class,
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]
        );

        $this->rollBackSlackMessage();
    }

    public function testAppendAction()
    {
        $newData = [new AttachmentAction(), new AttachmentAction()];
        $this->slackMessageMock->getAttachments()[0]->setActions($newData);
        $newAction = new AttachmentAction();
        $newData[] = $newAction;
        $this->slackMessageMock->getAttachments()[0]->appendAction($newAction);
        $this->assertTrue(is_array($this->slackMessageMock->getAttachments()[0]->getActions()));
        $this->assertTrue(count($newData) === count($this->slackMessageMock->getAttachments()[0]->getActions()));
        $this->assertSame($newData, $this->slackMessageMock->getAttachments()[0]->getActions());
        $this->assertInstanceOf(
            AttachmentAction::class,
            $this->slackMessageMock->getAttachments()[0]->getActions()[0]
        );

        $this->rollBackSlackMessage();
    }
}
