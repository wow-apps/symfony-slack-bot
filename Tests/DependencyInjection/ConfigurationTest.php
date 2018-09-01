<?php
/**
 * Created by PhpStorm.
 * User: alexeysamara
 * Date: 9/1/18
 * Time: 21:53
 */

namespace WowApps\SlackBundle\Tests\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use WowApps\SlackBundle\DependencyInjection\Configuration;
use WowApps\SlackBundle\Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testGetConfigTreeBuilder()
    {
        $configurator = new Configuration();
        $treeBuilder = $configurator->getConfigTreeBuilder();
        $this->assertInternalType('object', $treeBuilder);
        $this->assertInstanceOf(TreeBuilder::class, $treeBuilder);
    }
}
