<?php

namespace Wowapps\SlackBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('wowapps_slack');
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
