# Usage {docsify-ignore}

## Create message object {docsify-ignore}

```php
use WowApps\SlackBundle\DTO\SlackMessage;
use WowApps\SlackBundle\Service\SlackBot;
```

### Simple message {docsify-ignore}

```php
$slackMessage = new SlackMessage('If you read this - SlackBot is working!');
```

### Adding more options to Message {docsify-ignore}

<!-- tabs:start -->
#### ** Object setters **

```php
$slackMessage = new SlackMessage();

$slackMessage
    ->setText('Simple text')
    ->setUsername('Bot')
    ->setChannel('notifications')
    ->setIconEmoji(SlackEmoji::ACTIVITY__8BALL);
```

#### ** Create object with parameters **

```php
$slackMessage = new SlackMessage(
    'Simple text', // Text of message
    'Bot', // User name
    'notifications', // Channel name
    '', // Icon URL
    SlackEmoji::ACTIVITY__8BALL, // Icon Emoji,
    true, // Enable markdown
    [] // Array of attachments
);
```

<!-- tabs:end -->

![](https://wow-apps.github.io/symfony-slack-bot/assets/images/docs/using-1.jpg ":no-zoom")

### Setting message icon {docsify-ignore}
<!-- tabs:start -->
#### ** Custom icon by url **
```php
$slackMessage->setIconUrl('https://wow-apps.github.io/symfony-slack-bot/public/message-icon.png');
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

### List of SlackMessage methods {docsify-ignore}

#### `getUsername` {docsify-ignore}
_Arguments: -_

_Returns: `string`: user name_

Returns the user name on behalf of which the message will be sent

---

#### `setUsername` {docsify-ignore}
_Arguments:_
* _`string`: username_

_Returns: `WowApps\SlackBundle\DTO\SlackMessage`_

Set the user name on behalf of which the message will be sent

---

#### `getChannel` {docsify-ignore}
_Arguments: -_

_Returns: `string`: channel name_

Returns the name of channel where the message will be sent

---

#### `setChannel` {docsify-ignore}
_Arguments:_
* _`string`: channel name_

_Returns: `WowApps\SlackBundle\DTO\SlackMessage`_

Set the name of channel where the message will be sent

---

#### `getIconUrl` {docsify-ignore}
_Arguments: -_

_Returns: `string`: Icon url_

Returns icon url of message

---

#### `setIconUrl` {docsify-ignore}
_Arguments:_
* _`string`: icon url_

_Returns: `WowApps\SlackBundle\DTO\SlackMessage`_

Set the icon url for a message

---

#### `getIconEmoji` {docsify-ignore}
_Arguments: -_

_Returns: `string`: Icon Emoji_

Returns icon Emoji of message

---

#### `setIconEmoji` {docsify-ignore}
_Arguments:_
* _`string`: icon Emoji_

_Returns: `WowApps\SlackBundle\DTO\SlackMessage`_

Set the icon Emoji for a message.

> [!NOTE]
> You can use [SlackEmoji](4x/helpers-emoji.md) for setting Emoji as icon

---

#### `isMarkdown` {docsify-ignore}
_Arguments: -_

_Returns: `bool`: markdown state_

Returns state of markdown support of message

---

#### `setMarkdown` {docsify-ignore}
_Arguments:_
* _`bool`: markdown state_

_Returns: `WowApps\SlackBundle\DTO\SlackMessage`_

Set the state of markdown support of message

---

#### `getText` {docsify-ignore}
_Arguments: -_

_Returns: `string`: message text_

Returns main text of message

---

#### `setText` {docsify-ignore}
_Arguments:_
* _`string`: main text_

_Returns: `WowApps\SlackBundle\DTO\SlackMessage`_

Set the main text of message

---

#### `getAttachments` {docsify-ignore}
_Arguments: -_

_Returns: `array`: array of Attachment DTOs_

Returns collection of Attachment DTOs

> [!NOTE]
> Read more about [Attachment DTO](usage-dto-attachment.md)

---

#### `setAttachments` {docsify-ignore}
_Arguments:_
* _`array`: array of Attachment DTOs_

_Returns: `WowApps\SlackBundle\DTO\SlackMessage`_

Set collection of Attachment DTOs

---

#### `appendAttachment` {docsify-ignore}
_Arguments:_
* _`Attachment`: Attachment DTO_

_Returns: `WowApps\SlackBundle\DTO\SlackMessage`_

Appends Attachment DTO to collection

---
