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

namespace WowApps\SlackBundle\tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use WowApps\SlackBundle\DependencyInjection\WowAppsSlackExtension;
use Symfony\Component\Yaml\Yaml;

class WowAppsSlackExtensionTest extends AbstractExtensionTestCase
{
    protected function getContainerExtensions()
    {
        return [
            new WowAppsSlackExtension(),
        ];
    }

    public function testParametersAfterLoad()
    {
        $config = Yaml::parseFile(__DIR__ . '/../Fixtures/config.yaml');
        $this->load($config['wow_apps_slack']);
        $this->assertContainerBuilderHasParameter('wowapps.slackbot.config', $config['wow_apps_slack']);
    }
}
