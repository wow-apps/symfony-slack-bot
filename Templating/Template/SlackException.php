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

namespace WowApps\SlackBundle\Templating\Template;

use WowApps\SlackBundle\Entity\Attachment;
use WowApps\SlackBundle\Entity\AttachmentAction;
use WowApps\SlackBundle\Entity\AttachmentField;
use WowApps\SlackBundle\Entity\SlackMessage;
use WowApps\SlackBundle\Service\SlackColor;
use WowApps\SlackBundle\Service\SlackEmoji;
use WowApps\SlackBundle\Service\SlackMarkdown;
use WowApps\SlackBundle\Templating\SlackTemplateInterface;

class SlackException implements SlackTemplateInterface
{
    /** @var \Exception */
    private $payload;

    /** @var bool */
    private $includeTrace;

    /** @var bool */
    private $searchButtons;

    /** @var array */
    private $searchSources = [
        SlackEmoji::OBJECTS__MAG . ' Search on Google' => 'https://www.google.com/search?q=%s',
        SlackEmoji::OBJECTS__MAG . ' Search on StackOverflow' => 'https://stackoverflow.com/search?q=%s',
        SlackEmoji::OBJECTS__MAG . ' Search on Symfony.com' => 'https://symfony.com/search?q=%s',
    ];

    /**
     * ExceptionTemplate constructor.
     *
     * @param \Exception $payload
     * @param bool       $includeTrace
     * @param bool       $searchButtons
     */
    public function __construct(\Exception $payload, bool $includeTrace = true, bool $searchButtons = true)
    {
        $this->payload = $payload;
        $this->includeTrace = $includeTrace;
        $this->searchButtons = $searchButtons;
    }

    /**
     * @return string
     */
    public function getConfigIndex(): string
    {
        return 'exception';
    }

    /**
     * @return SlackMessage
     */
    public function getMessage(): SlackMessage
    {
        $slackMessage = new SlackMessage();

        $slackMessage
            ->setMarkdown(true)
            ->setText($this->payload->getMessage());

        $slackMessage->appendAttachment($this->getExceptionBody());

        if ($this->includeTrace) {
            $slackMessage->appendAttachment($this->getExceptionTrace());
        }

        return $slackMessage;
    }

    /**
     * @return Attachment
     */
    private function getExceptionBody(): Attachment
    {
        $exceptionBody = new Attachment();
        $exceptionBody
            ->setColor(SlackColor::COLOR_DANGER)
            ->setFields([
                new AttachmentField(
                    'File:',
                    SlackMarkdown::italic($this->payload->getFile())
                ),
                new AttachmentField(
                    'Line number:',
                    $this->payload->getLine(),
                    true
                ),
                new AttachmentField(
                    'Exception Code #:',
                    $this->payload->getCode(),
                    true
                ),
            ]);

        if ($this->searchButtons) {
            $exceptionBody->setActions($this->getButtons());
        }

        return $exceptionBody;
    }

    /**
     * @return Attachment
     */
    private function getExceptionTrace(): Attachment
    {
        $exceptionTrace = new Attachment();

        $exceptionTrace
            ->setColor(SlackColor::COLOR_DEFAULT)
            ->setPretext(SlackMarkdown::bold('Trace:'))
            ->setText(SlackMarkdown::multilines($this->getPayloadTrace()));

        return $exceptionTrace;
    }

    /**
     * @return array
     */
    private function getPayloadTrace(): array
    {
        $trace = [];

        foreach ($this->payload->getTrace() as $traceStepNumber => $traceStep) {
            $trace[] = sprintf(
                '[%d] %s:%d',
                ++$traceStepNumber,
                SlackMarkdown::italic($traceStep['file']),
                $traceStep['line']
            );
            $trace[] = SlackMarkdown::inlineCode(
                $traceStep['class'] . $traceStep['type'] . $traceStep['function'] . '()'
            );
            $trace[] = SlackMarkdown::newLine();
        }

        return $trace;
    }

    /**
     * @return array
     */
    private function getButtons(): array
    {
        $buttons = [];

        $exceptionMessage = $this->payload->getMessage();

        if (preg_match('/\\n/i', $exceptionMessage)) {
            $exceptionMessageArray = explode("\n", $exceptionMessage);
            $exceptionMessage = $exceptionMessageArray[0];
        }

        $searchText = urlencode($exceptionMessage);

        foreach ($this->searchSources as $buttonName => $buttonUrl) {
            $buttons[] = new AttachmentAction(
                $buttonName,
                sprintf($buttonUrl, $searchText)
            );
        }

        return $buttons;
    }
}
