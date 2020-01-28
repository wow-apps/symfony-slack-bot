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

use Nyholm\BundleTest\BaseBundleTestCase;
use WowApps\SlackBundle\Service\SlackBot;
use WowApps\SlackBundle\WowAppsSlackBundle;

class WowAppsSlackBundleTest extends BaseBundleTestCase
{
    const SERVICE_NAME = 'wowapps.slackbot';
    const BUNDLE_VERSION_PATTERN = '/^\d{1,3}\.\d{1,3}\.\d{1,3}$/i';

    protected function getBundleClass()
    {
        return WowAppsSlackBundle::class;
    }

    public function testBundleVersionConst()
    {
        $reflectionClass = new \ReflectionClass($this->getBundleClass());
        $classConstants = $reflectionClass->getConstants();
        $this->assertTrue(!empty($classConstants['CURRENT_VERSION']));
        $this->assertTrue((bool) preg_match(self::BUNDLE_VERSION_PATTERN, WowAppsSlackBundle::CURRENT_VERSION));
    }

    public function testInitBundle()
    {
        $kernel = $this->createKernel();
        $kernel->addConfigFile(__DIR__ . '/Fixtures/config.yaml');
        $kernel->addBundle(WowAppsSlackBundle::class);
        $this->bootKernel();

        $container = $this->getContainer();
        $this->assertTrue($container->has(self::SERVICE_NAME));
        $service = $container->get(self::SERVICE_NAME);
        $this->assertInstanceOf(SlackBot::class, $service);
    }
}
