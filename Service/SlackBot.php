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

namespace WowApps\SlackBundle\Service;

use WowApps\SlackBundle\DTO\SlackMessage;

/**
 * @author Alexey Samara <lion.samara@gmail.com>
 * @package WowApps\SlackBundle
 * @see https://github.com/wow-apps/symfony-slack-bot/wiki/2.-Using-SlackBot
 */
class SlackBot
{
    const QUOTE_DEFAULT   = 0;
    const QUOTE_DANGER    = 1;
    const QUOTE_SUCCESS   = 2;
    const QUOTE_WARNING   = 3;
    const QUOTE_INFO      = 4;
    const QUOTE_MAP       = [
        self::QUOTE_DEFAULT  => 'default',
        self::QUOTE_DANGER   => 'danger',
        self::QUOTE_SUCCESS  => 'success',
        self::QUOTE_WARNING  => 'warning',
        self::QUOTE_INFO     => 'info'
    ];

    /** @var array */
    private $config;

    /** @var SlackAdapter */
    private $adapter;

    /** @var SlackProvider */
    private $provider;

    /**
     * SlackBot constructor.
     *
     * @param array         $config
     * @param SlackAdapter  $adapter
     * @param SlackProvider $provider
     */
    public function __construct(array $config, SlackAdapter $adapter, SlackProvider $provider)
    {
        $this->config = $config;
        $this->adapter = $adapter;
        $this->provider = $provider;
        $this->adapter->setConfig($this->config);
        $this->provider->setConfig($this->config);
    }

    /**
     * @param int $quoteType
     * @return string
     */
    public function quoteTypeColor(int $quoteType): string
    {
        if (!array_key_exists($quoteType, self::QUOTE_MAP)) {
            throw new \InvalidArgumentException('Unknown quote type');
        }

        return $this->config['quote_color'][self::QUOTE_MAP[$quoteType]];
    }

    /**
     * @param SlackMessage $slackMessage
     * @return bool
     */
    public function send(SlackMessage $slackMessage): bool
    {
        return $this->provider->sendRequest(
            $this->adapter->buildRequestBody($slackMessage)
        );
    }
}
