# Testing configuration

To test working of Symfony Slack Bot in your application, you can use special command.

## Send test message {docsify-ignore}

You can easy send test message to your Slack channel, if [configuration](configuring.md) is valid.

```bash
./bin/console wowapps:slackbot:test
```

![](https://wow-apps.github.io/symfony-slack-bot/assets/images/docs/testing-1.jpg)

## Additional parameters {docsify-ignore}

### `--skip-sending` {docsify-ignore}

Skip sending message and just show configuration debug.

![](https://wow-apps.github.io/symfony-slack-bot/assets/images/docs/testing-3.jpg)

### `--include-exception` {docsify-ignore}

Send test message with template exception

![](https://wow-apps.github.io/symfony-slack-bot/assets/images/docs/testing-2.jpg)

> [!NOTE|label:Read more]
> about [template messages](https://google.com)