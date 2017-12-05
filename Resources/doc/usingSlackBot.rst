## Create message

```php
use WowApps\SlackBundle\DTO\SlackMessage;
use WowApps\SlackBundle\Service\SlackBot;
```

### Fill DTO:

#### Simple message

```php
$slackMessage = new SlackMessage();

$slackMessage
    ->setIcon('http://cdn.wow-apps.pro/slackbot/slack-bot-icon-48.png')
    ->setText('If you read this - SlackBot is working!')
    ->setRecipient('general')
    ->setSender('WoW-Apps')
;
```

#### Message with quote

```php
$slackMessage = new SlackMessage();

$slackMessage
    ->setIcon('http://cdn.wow-apps.pro/slackbot/slack-bot-icon-48.png')
    ->setText('If you read this - SlackBot is working!')
    ->setRecipient('general')
    ->setSender('WoW-Apps')
    ->setShowQuote(true)
    ->setQuoteType(SlackBot::QUOTE_SUCCESS)
    ->setQuoteText('Some text inside quote')
    ->setQuoteTitle('SlackBot for Symfony 3')
    ->setQuoteTitleLink('https://github.com/wow-apps/symfony-slack-bot')
;
```

| Method | Required | @param | Description |
|---|:---:|:---:|---|
| setIcon | - | string | Set url of custom icon for Bot in Slack. Accept _*.jpg_, _*.png_ with size 48x48 px. If not set, will get from options |
| setText | ✔ | string | Set main text of the message |
| setRecipient | - | string | Set where you want send message. Accept channel name or user name for direct message. If not set, will get from options |
| setSender | - | string | Set Bot name. If not set, will get from options |
| setShowQuote | - | bool | Show quote or not |
| setQuoteType | - | int | Choose color of quote line. Accept: _SlackBot::QUOTE_DEFAULT_, _SlackBot::QUOTE_DANGER_, _SlackBot::QUOTE_SUCCESS_, _SlackBot::QUOTE_WARNING_, _SlackBot::QUOTE_INFO_ |
| setQuoteText | - | string | Set quote text |
| setQuoteTitle | - | string | Set quote title |
| setQuoteTitleLink | - | string | Set link of quote title |


## Send message

```php
/** @var SlackBot $slackBot */
$slackBot = $this->getContainer()->get('wowapps.slackbot');

$slackMessage = new SlackMessage();

$slackMessage
    ->setIcon('http://cdn.wow-apps.pro/slackbot/slack-bot-icon-48.png')
    ->setText('If you read this - SlackBot is working!')
    ->setRecipient('general')
    ->setSender('WoW-Apps')
;

if ($slackBot->sendMessage($slackMessage)) {
    // Message sent successfully
} else {
    // Message not sent
}
```
