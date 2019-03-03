# Usage {docsify-ignore}

## Create message object {docsify-ignore}

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
$slackMessage->setIconUrl('//cdn.wow-apps.pro/slackbot/slack-bot-icon-48.png');
```

#### ** Emoji as icon **
```php
// don't forget to
use WowApps\SlackBundle\Service\SlackEmoji;
```

```php
$slackMessage->setIconEmoji(SlackEmoji::PEOPLE_ALIEN);
```

> [!NOTE]
> In a case, if you'll set `iconEmoji` together with `iconUrl` in one message object, `iconUrl` will have higher priority

<!-- tabs:end -->
