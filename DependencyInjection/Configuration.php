<?php
/**
 * This file is part of the WoW-Apps/Symfony-Slack-Bot bundle for Symfony 3
 * https://github.com/wow-apps/symfony-slack-bot
 *
 * (c) 2016 WoW-Apps
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WowApps\SlackBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('wow_apps_slack');
        $rootNode
            ->children()
                ->scalarNode('api_url')->defaultValue('')->end()
                ->scalarNode('default_icon')
                    ->defaultValue('http://cdn.wow-apps.pro/slackbot/slack-bot-icon-48.png')
                ->end()
                ->scalarNode('default_channel')->defaultValue('general')->end()
                    ->arrayNode('quote_color')
                    ->children()
                        ->scalarNode('default')->defaultValue('#607D8B')->end()
                        ->scalarNode('info')->defaultValue('#2196F3')->end()
                        ->scalarNode('warning')->defaultValue('#FF5722')->end()
                        ->scalarNode('success')->defaultValue('#8BC34A')->end()
                        ->scalarNode('danger')->defaultValue('#F44336')->end()
                    ->end()
                ->end()
            ->end()
        ;
        return $treeBuilder;
    }
}
