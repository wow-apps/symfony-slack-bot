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

![](https://wow-apps.github.io/symfony-slack-bot/assets/images/docs/using-2.jpg ":no-zoom")
