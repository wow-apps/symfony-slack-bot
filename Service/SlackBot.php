<?php

namespace WowApps\SlackBotBundle\Service;

use GuzzleHttp\Client as GuzzleClient;
use WowApps\SlackBotBundle\DTO\SlackMessage;

class SlackBot
{
    const QUOTE_DEFAULT   = 0;
    const QUOTE_DANGER    = 1;
    const QUOTE_SUCCESS   = 2;
    const QUOTE_WARNING   = 3;
    const QUOTE_INFO      = 4;

    /** @var array */
    private $config;

    /** @var GuzzleClient */
    private $guzzleClient;

    public function __construct(array $config)
    {
        $this->setConfig($config);
        $this->guzzleClient = new GuzzleClient();
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
        switch ($quoteType) {
            case self::QUOTE_DANGER:
                $colorHEX = $this->config['quote_color']['danger'];
                break;
            case self::QUOTE_SUCCESS:
                $colorHEX = $this->config['quote_color']['success'];
                break;
            case self::QUOTE_WARNING:
                $colorHEX = $this->config['quote_color']['warning'];
                break;
            case self::QUOTE_INFO:
                $colorHEX = $this->config['quote_color']['info'];
                break;
            case self::QUOTE_DEFAULT:
            default:
                $colorHEX = $this->config['quote_color']['default'];
                break;
        }

        return $colorHEX;
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
     * @throws \InvalidArgumentException
     */
    private function buildPostBody(SlackMessage $slackMessage): string
    {
        if (!$slackMessage->getText()) {
            throw new \InvalidArgumentException('Message can\'t be empty');
        }

        if (!$slackMessage->getIcon()) {
            $return['icon_url'] = $this->config['default_icon'];
        } else {
            $return['icon_url'] = $slackMessage->getIcon();
        }

        if (!$slackMessage->getRecipient()) {
            $return['channel'] = $this->config['default_channel'];
        } else {
            $return['channel'] = $slackMessage->getRecipient();
        }

        if (!$slackMessage->getSender()) {
            $return['username'] = 'SlackBot';
        } else {
            $return['username'] = $slackMessage->getSender();
        }

        $return['text'] = $slackMessage->getText();
        $return['mrkdwn'] = true;

        if ($slackMessage->isShowQuote()) {
            $return['attachments'] = [
                'fallback' => $slackMessage->getText(),
                'pretext' => $slackMessage->getText(),
                'fields' => [
                    'title' => (!$slackMessage->getQuoteTitle() ? '' : $slackMessage->getQuoteTitle()),
                    'title_link' => (!$slackMessage->getQuoteTitleLink() ? '' : $slackMessage->getQuoteTitleLink()),
                    'text' => (!$slackMessage->getQuoteText() ? '' : $slackMessage->getQuoteText()),
                    'color' => $this->quoteTypeColor($slackMessage->getQuoteType()),
                    'mrkdwn_in' => ['text', 'pretext']
                ]
            ];
        }

        return json_encode($return, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param string $postBody
     * @return bool
     */
    private function sendRequest(string $postBody): bool
    {
        $request = $this->guzzleClient->post($this->config['api_url'], ['body' => $postBody]);
        if (!in_array($request->getStatusCode(), [200, 301, 302])) {
            return false;
        }

        return true;
    }
}
