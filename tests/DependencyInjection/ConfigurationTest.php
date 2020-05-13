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

namespace WowApps\SlackBundle\Tests\DependencyInjection;

use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use WowApps\SlackBundle\DependencyInjection\Configuration;
use WowApps\SlackBundle\Tests\TestCase;

/**
 * Class ConfigurationTest.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class ConfigurationTest extends TestCase
{
    use ConfigurationTestCaseTrait;

    const VERSION_KEY = 'current_version';

    /** @var array */
    private $requiredParams;

    protected function setUp()
    {
        $this->requiredParams = [
            'api_url' => $this->randomString(),
        ];

        parent::setUp();
    }

    protected function getConfiguration()
    {
        return new Configuration();
    }

    public function testGetConfigTreeBuilder()
    {
        $configurator = $this->getConfiguration();
        $treeBuilder = $configurator->getConfigTreeBuilder();
        $this->assertTrue(is_object($treeBuilder));
        $this->assertInstanceOf(TreeBuilder::class, $treeBuilder);
    }

    public function testRequiredValues()
    {
        $testedParameters = [];
        foreach ($this->requiredParams as $key => $value) {
            $this->assertConfigurationIsInvalid([$testedParameters], $key);
            $testedParameters[$key] = $value;
        }
    }

    public function testConfigurationProcess()
    {
        foreach ($this->requiredParams as $key => $value) {
            $this->assertProcessedConfigurationEquals(
                [
                    [$key => $this->randomString()],
                    [$key => $value],
                ],
                [$key => $value],
                $key
            );
        }
    }
}
