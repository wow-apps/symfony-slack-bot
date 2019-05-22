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

namespace WowApps\SlackBundle\Service;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;
use WowApps\SlackBundle\Exception\SlackbotException;

/**
 * Class SlackProvider.
 *
 * @author Alexey Samara <lion.samara@gmail.com>
 */
class SlackProvider
{
    const ALLOWED_RESPONSE_STATUSES = [
        Response::HTTP_OK,
        Response::HTTP_MOVED_PERMANENTLY,
        Response::HTTP_FOUND,
    ];

    /** @var array */
    private $config;

    /** @var string */
    private $apiUrl;

    /** @var Client */
    private $client;

    /**
     * SlackProvider constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        if (empty($this->config['api_url'])) {
            throw new SlackbotException(SlackbotException::E_MISSING_API_URL);
        }
        $this->apiUrl = $this->config['api_url'];
        $this->client = new Client();
    }

    /**
     * @param string $postBody
     *
     * @return bool
     */
    public function send(string $postBody): bool
    {
        $request = $this->client->post(
            $this->apiUrl,
            ['body' => $postBody]
        );

        if (!in_array($request->getStatusCode(), self::ALLOWED_RESPONSE_STATUSES)) {
            throw new SlackbotException(
                SlackbotException::E_BAD_RESPONSE,
                ['status_code: ' . $request->getStatusCode()]
            );
        }

        return true;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     *
     * @return SlackProvider
     */
    public function setApiUrl(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;

        return $this;
    }
}
