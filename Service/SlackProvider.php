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

use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\HttpFoundation\Response;

class SlackProvider
{
    const ALLOWED_RESPONSE_STATUSES = [
        Response::HTTP_OK,
        Response::HTTP_MOVED_PERMANENTLY,
        Response::HTTP_FOUND
    ];

    /** @var array */
    private $config;

    /** @var GuzzleClient */
    private $guzzleClient;

    public function __construct(GuzzleClient $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $postBody
     * @return bool
     */
    public function sendRequest(string $postBody): bool
    {
        if (empty($this->config)) {
            return false;
        }

        $request = $this->guzzleClient->post(
            $this->config['api_url'],
            ['body' => $postBody]
        );

        if (!in_array($request->getStatusCode(), self::ALLOWED_RESPONSE_STATUSES)) {
            return false;
        }

        return true;
    }
}
