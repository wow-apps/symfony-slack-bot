# Usage {docsify-ignore}

## Send message {docsify-ignore}

```php
<?php

namespace App;

use WowApps\SlackBundle\Service\SlackBot;
use WowApps\SlackBundle\DTO\SlackMessage;
use WowApps\SlackBundle\Service\SlackEmoji;

class Foo
{
    /** @var SlackBot */
    private $slackBot;
    
    /**
     * @param SlackBot $slackBot
     */
    public function __construct(SlackBot $slackBot)
    {
        $this->slackBot = $slackBot;
    }
    
    public function Bar()
    {
        $slackMessage = new SlackMessage();
        
        $slackMessage
            ->setText('Simple text')
            ->setUsername('Bot')
            ->setChannel('notifications')
            ->setIconEmoji(SlackEmoji::ACTIVITY__8BALL);
        
        if ($this->slackBot->send($slackMessage)) {
            // Message sent successfully
        } else {
            // Message not sent
        }
    }
}
```