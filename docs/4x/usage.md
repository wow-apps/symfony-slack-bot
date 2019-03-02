# Usage {docsify-ignore}

## Service injection

<!-- tabs:start -->

#### ** Autowiring **
```php
<?php

namespace App;

use WowApps\SlackBundle\Service\SlackBot;

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
}
```

#### ** Getting from container **
```php
/** @var SlackBot $slackBot */
$slackBot = $this->getContainer()->get('wowapps.slackbot');
```

#### ** As argument **
```yaml
services:
    App\Foo:
        public: false
        arguments:
            - '@wowapps.slackbot'
```

<!-- tabs:end -->

## Create message object

```php
use WowApps\SlackBundle\DTO\SlackMessage;
use WowApps\SlackBundle\Service\SlackBot;
```

#### Simple message {docsify-ignore}

```php
$slackMessage = new SlackMessage('If you read this - SlackBot is working!');
```

#### Adding more options to Message {docsify-ignore}

```php
$slackMessage = new SlackMessage();

$slackMessage
    ->setText('Simple text')
    ->setUsername('Bot')
    ->setChannel('notifications')
    ->setIconEmoji(SlackEmoji::ACTIVITY__8BALL);
```

![](https://wow-apps.github.io/symfony-slack-bot/assets/images/docs/using-1.jpg ":no-zoom")

#### Setting message icon {docsify-ignore}
<!-- tabs:start -->
#### ** Custom icon by url **
```php
$slackMessage = new SlackMessage('If you read this - SlackBot is working!');
$slackMessage->setIconUrl('//cdn.wow-apps.pro/slackbot/slack-bot-icon-48.png');
```

#### ** Icon from Emoji **
> Need to add usage of SlackEmoji
> ```php
use WowApps\SlackBundle\Service\SlackEmoji;
```

```php
$slackMessage = new SlackMessage('If you read this - SlackBot is working!');
$slackMessage->setIconEmoji(SlackEmoji::PEOPLE_ALIEN);
```
<!-- tabs:end -->

## Send message

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
            ->setIconEmoji(SlackEmoji::PEOPLE_ALIEN)
            ->setText('If you read this - SlackBot is working!')
            ->setRecipient('general')
            ->setSender('WoW-Apps');
        
        if ($this->slackBot->sendMessage($slackMessage)) {
            // Message sent successfully
        } else {
            // Message not sent
        }
    }
}
```
