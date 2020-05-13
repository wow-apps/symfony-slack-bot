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

namespace WowApps\SlackBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Alexey Samara <lion.samara@gmail.com>
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
                ->scalarNode('api_url')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->arrayNode('channels')
                    ->scalarPrototype()->end()
                ->end()
                ->scalarNode('default_icon_url')
                    ->defaultValue('https://wow-apps.github.io/symfony-slack-bot/public/message-icon.png')
                ->end()
                ->scalarNode('default_username')
                    ->defaultValue('wow-apps/symfony-slack-bot')
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('default_fallback')->defaultValue('Can\'t display attachment in plain-text mode')->end()
                ->arrayNode('colors')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('default')->defaultValue('#607D8B')->end()
                        ->scalarNode('info')->defaultValue('#2196F3')->end()
                        ->scalarNode('warning')->defaultValue('#FF5722')->end()
                        ->scalarNode('success')->defaultValue('#8BC34A')->end()
                        ->scalarNode('danger')->defaultValue('#F44336')->end()
                    ->end()
                ->end()
                ->arrayNode('templates')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('exception')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('username')->defaultValue('Exception')->end()
                                ->scalarNode('channel')->defaultValue('general')->end()
                                ->scalarNode('icon')
                                    ->defaultValue(
                                        'https://wow-apps.github.io/symfony-slack-bot/public/exception-icon.png'
                                    )
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
