# Usage {docsify-ignore}

## Message attachments {docsify-ignore}

> [!WARNING|label:Attachments limit]
> The number of attachments is limited to 20th per message.

```php
use WowApps\SlackBundle\DTO\SlackMessage;
use WowApps\SlackBundle\DTO\Attachment;
use WowApps\SlackBundle\Service\SlackColor;
```

### Adding attachments to message {docsify-ignore}

```php
$slackMessage = new SlackMessage('Let\'s test attachment for this message');

$slackMessage->setAttachments(
    [
        new Attachment(
            SlackColor::COLOR_DEFAULT,
            'This is attachment text'
        ),
        new Attachment(
            SlackColor::COLOR_INFO,
            'This is info attachment text'
        ),
    ]
);
```

### Adding more options to Attachment {docsify-ignore}

```php
$slackMessage = new SlackMessage('Let\'s test attachment for this message');

$attachment = new Attachment();
$attachment
    ->setColor(SlackColor::COLOR_INFO)
    ->setPretext('This is pre-text')
    ->setAuthorName('Author Name')
    ->setAuthorLink('https://wow-apps.pro')
    ->setAuthorIconUrl('https://s3-eu-west-1.amazonaws.com/wbm.thumbnail/dissolve/1200/713853.jpg')
    ->setTitle('This is title')
    ->setTitleLink('https://github.com')
    ->setText('This is regular text')
    ->setImageUrl('https://shoottheframe.com/wp-content/uploads/2017/01/Sander_Grefte_shoot_the_land_shoot_the_frame_3-500x500.jpg')
    ->setThumbUrl('https://shoottheframe.com/wp-content/uploads/2017/01/Sander_Grefte_shoot_the_land_shoot_the_frame_3-500x500.jpg')
    ->setFooter('This is footer')
    ->setFooterIconUrl('https://imag.malavida.com/mvimgbig/download-s/php-5-393-0.jpg')
    ->setFallback('This is fallback text for cases, when user watch message in compact mode')
    ->setTimestamp(time());

$slackMessage->appendAttachment($attachment);
```

![](https://wow-apps.github.io/symfony-slack-bot/assets/images/docs/using-2.jpg)

### List of Attachment methods {docsify-ignore}

#### `getColor` {docsify-ignore}
_Arguments: -_

_Returns: `string`: color_

Returns attachment's left border color

---

#### `setColor` {docsify-ignore}
_Arguments:_
* _`string`: color_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set attachment's left border color

> [!NOTE]
> Allowed colors: `SlackColor::COLOR_DEFAULT`, `SlackColor::COLOR_DANGER`, `SlackColor::COLOR_SUCCESS`, `SlackColor::COLOR_WARNING`, `SlackColor::COLOR_INFO`
>
> Read more about [SlackColor](4x/helpers-color.md) 

---

#### `getPretext` {docsify-ignore}
_Arguments: -_

_Returns: `string`: pretext_

Returns text, that shown before attachment

---

#### `setPretext` {docsify-ignore}
_Arguments:_
* _`string`: pretext_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set the text, that shown before attachment 

---

#### `getAuthorName` {docsify-ignore}
_Arguments: -_

_Returns: `string`: Author name_

Returns name of the attachment's author

---

#### `setAuthorName` {docsify-ignore}
_Arguments:_
* _`string`: author name_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set the attachment's author name

---

#### `getAuthorLink` {docsify-ignore}
_Arguments: -_

_Returns: `string`: Author link_

Returns attachment's author link

---

#### `setAuthorLink` {docsify-ignore}
_Arguments:_
* _`string`: author link_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set the attachment's author link

---

#### `getAuthorIconUrl` {docsify-ignore}
_Arguments: -_

_Returns: `string`: Author icon url_

Returns attachment's author icon url

---

#### `setAuthorIconUrl` {docsify-ignore}
_Arguments:_
* _`string`: author icon url_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set the attachment's author icon url

---

#### `getTitle` {docsify-ignore}
_Arguments: -_

_Returns: `string`: attachment title_

Returns attachment title

---

#### `setTitle` {docsify-ignore}
_Arguments:_
* _`string`: attachment title_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set attachment title

---

#### `getTitleLink` {docsify-ignore}
_Arguments: -_

_Returns: `string`: attachment title link_

Returns attachment title link

---

#### `setTitleLink` {docsify-ignore}
_Arguments:_
* _`string`: attachment title link_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set attachment title link

---

#### `getText` {docsify-ignore}
_Arguments: -_

_Returns: `string`: attachment text_

Returns attachment main text

---

#### `setText` {docsify-ignore}
_Arguments:_
* _`string`: attachment text_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set attachment main text

---

#### `getFields` {docsify-ignore}
_Arguments: -_

_Returns: `array`: `AttachmentField` array_

Returns collection of [attachment fields](4x/usage-dto-fields.md)

---

#### `setFields` {docsify-ignore}
_Arguments:_
* _`AttachmentField[]`: attachment fields array_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set collection of [attachment fields](4x/usage-dto-fields.md)

---

#### `appendField` {docsify-ignore}
_Arguments:_
* _`AttachmentField`: attachment field_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Append [attachment fields](4x/usage-dto-fields.md) to collection

---

#### `getImageUrl` {docsify-ignore}
_Arguments: -_

_Returns: `string`: image url_

Returns attachment image url

---

#### `setImageUrl` {docsify-ignore}
_Arguments:_
* _`string`: image url_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set attachment image url

---

#### `getThumbUrl` {docsify-ignore}
_Arguments: -_

_Returns: `string`: image thumb url_

Returns attachment image thumb url

---

#### `setThumbUrl` {docsify-ignore}
_Arguments:_
* _`string`: image thumb url_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set attachment image thumb url

---

#### `getFooter` {docsify-ignore}
_Arguments: -_

_Returns: `string`: footer text_

Returns attachment footer text

---

#### `setFooter` {docsify-ignore}
_Arguments:_
* _`string`: footer text_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set attachment footer text

---

#### `getFooterIconUrl` {docsify-ignore}
_Arguments: -_

_Returns: `string`: footer icon url_

Returns attachment footer icon url

---

#### `setFooterIconUrl` {docsify-ignore}
_Arguments:_
* _`string`: footer icon url_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set attachment footer icon url

---

#### `getFallback` {docsify-ignore}
_Arguments: -_

_Returns: `string`: fallback text_

Returns attachment fallback text

> **Fallback** is a plain-text summary of the attachment. This text will be used in clients that don't show formatted text (eg. IRC, mobile notifications) and should not contain any markup.
> [Read more in Slack API Documentation](https://api.slack.com/docs/message-attachments)

---

#### `setFallback` {docsify-ignore}
_Arguments:_
* _`string`: fallback text_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set attachment fallback text

> [!NOTE]
> If you'll not set fallback text for attachment, it be set from [default value](4x/configuring.md?id=default_fallback)

---

#### `getTimestamp` {docsify-ignore}
_Arguments: -_

_Returns: `string`: timestamp_

Returns attachment timestamp, placed in footer

---

#### `setTimestamp` {docsify-ignore}
_Arguments:_
* _`string`: timestamp_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set attachment timestamp, placed in footer

!> Use `time()` as argument: `->setTimestamp(time())`

---

#### `getActions` {docsify-ignore}
_Arguments: -_

_Returns: `array`: array of `AttachmentAction`_

Returns array of attachment [actions](4x/usage-dto-action.md)

---

#### `setActions` {docsify-ignore}
_Arguments:_
* _`array`: array of `AttachmentAction`_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Set array of attachment [actions](4x/usage-dto-action.md)

---

#### `appendAction` {docsify-ignore}
_Arguments:_
* _`AttachmentAction`: attachment action_

_Returns: `WowApps\SlackBundle\DTO\Attachment`_

Append [action](4x/usage-dto-action.md) to attachment

---

