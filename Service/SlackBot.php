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

    const ALLOWED_RESPONSE_STATUSES = [
        Response::HTTP_OK,
        Response::HTTP_MOVED_PERMANENTLY,
        Response::HTTP_FOUND
    ];

    /** @var array */
    private $config;

    /** @var GuzzleClient */
    private $guzzleClient;

    /** @var SlackMessageValidator */
    private $validator;

    /**
     * @param array $config
     * @param SlackMessageValidator $validator
     */
    public function __construct(array $config, SlackMessageValidator $validator)
    {
        $this->setConfig($config);
        $this->guzzleClient = new GuzzleClient();
        $this->validator = $validator;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
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
    public function sendMessage(SlackMessage $slackMessage): bool
    {
        return $this->sendRequest($this->buildPostBody($slackMessage));
    }

    /**
     * @param SlackMessage $slackMessage
     * @return string
     */
    private function buildPostBody(SlackMessage $slackMessage): string
    {
        $this->validator->validateMessage($slackMessage);
        $slackMessage = $this->validator->setDefaultsForEmptyFields($slackMessage, $this->getConfig());

        $return = [
            'text' => $slackMessage->getText(),
            'channel' => $slackMessage->getRecipient(),
            'username' => $slackMessage->getSender(),
            'mrkdwn' => true,
            'as_user' => false
        ];

        if (!empty($slackMessage->getIconUrl())) {
            $return['icon_url'] = $slackMessage->getIconUrl();
        }

        if (empty($slackMessage->getIconUrl()) && !empty($slackMessage->getIconEmoji())) {
            $this->validator->validateIconEmoji($slackMessage);
            $return['icon_emoji'] = $slackMessage->getIconEmoji();
        }

        if ($slackMessage->isShowQuote()) {
            $return['attachments'][] = [
                'title' => (!$slackMessage->getQuoteTitle() ? '' : $slackMessage->getQuoteTitle()),
                'title_link' => (!$slackMessage->getQuoteTitleLink() ? '' : $slackMessage->getQuoteTitleLink()),
                'text' => (!$slackMessage->getQuoteText() ? '' : $slackMessage->getQuoteText()),
                'color' => $this->quoteTypeColor($slackMessage->getQuoteType()),
                'mrkdwn_in' => ['text', 'pretext'],
            ];
        }

        return json_encode($return, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * @param string $postBody
     * @return bool
     */
    private function sendRequest(string $postBody): bool
    {
        $request = $this->guzzleClient->post($this->config['api_url'], ['body' => $postBody]);
        if (!in_array($request->getStatusCode(), self::ALLOWED_RESPONSE_STATUSES)) {
            return false;
        }

        return true;
    }
}
