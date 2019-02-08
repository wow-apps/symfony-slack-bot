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

namespace WowApps\SlackBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;
use WowApps\SlackBundle\Command\WowappsSlackbotTestCommand;

class WowappsSlackbotTestCommandTest extends KernelTestCase
{
    /** @var Application */
    private $application;

    protected function setUp()
    {
        $kernel = static::bootKernel();
        $this->application = new Application($kernel);
        $this->application->add(new WowappsSlackbotTestCommand());
        parent::setUp();
    }

    public function testConfigure()
    {
        $command = $this->application->find(WowappsSlackbotTestCommand::COMMAND_NAME);
        $this->assertInstanceOf(Command::class, $command);
        $this->assertSame(WowappsSlackbotTestCommand::COMMAND_NAME, $command->getName());
    }

    public function testExecute()
    {
        $command = $this->application->find(WowappsSlackbotTestCommand::COMMAND_NAME);
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
            '--skip-sending' => true,
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains(WowappsSlackbotTestCommand::M_SENDING_SKIPPED, $output);
    }
}
