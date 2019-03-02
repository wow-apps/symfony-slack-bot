# Configuring

## Required configuration

<!-- tabs:start -->

#### ** Symfony 4 **

Configuration file `./config/packages/wow_apps_slack.yaml` will be created automatically by Symfony Flex
```yaml
services:
    # SlackBot Configuration
    wow_apps_slack:
        api_url: "%env(WOW_APPS_SLACK_BOT_API_URL)%"
```

You just need to add environment variable via `./.env` (or `./.env.local` / `./.env.dev` / `./.env.test`)

```dotenv
WOW_APPS_SLACK_BOT_API_URL=https://hooks.slack.com/services/000000/000000/000000
```

#### ** Symfony 3 **

Symfony 3: `./app/config/config.yml`
```yaml
services:
    # SlackBot Configuration
    wow_apps_slack:
        api_url: "https://hooks.slack.com/services/000000/000000/000000"
```

<!-- tabs:end -->

## Override default parameters

```yaml
services:
    # SlackBot Configuration
    wow_apps_slack:
        api_url: "%env(WOW_APPS_SLACK_BOT_API_URL)%"
        default_icon_url: "https://wow-apps.github.io/symfony-slack-bot/public/message-icon.png"
        default_channel: "general"
        default_username: "wow-apps/symfony-slack-bot"
        default_fallback: "Can't display attachment in plain-text mode"
        colors:
            default: "#607D8B"
            info: "#2196F3"
            warning: "#FF5722"
            success: "#8BC34A"
            danger: "#F44336"
        templates:
            exception:
                username: "Exception"
                channel: "general"
                icon: "https://wow-apps.github.io/symfony-slack-bot/public/exception-icon.png"
```

## Explanation of parameters

### `api_url` {docsify-ignore}

> [!WARNING|label:Required parameter]
> This parameter can't be empty and have no default value

After you'll [create your application](https://api.slack.com/incoming-webhooks) on Slack API portal, you'll get API URL for your web-hooks.

### `default_icon_url` {docsify-ignore}

If you'll don't set `iconUrl` or `iconEmoji` for Message DTO, message builder will set `iconUrl` from this parameter value. Use image full url.

### `default_channel` {docsify-ignore}

If you'll don't set `channel` for Message DTO, message builder will set it from this parameter value.

### `default_username` {docsify-ignore}

If you'll don't set `username` for Message DTO, message builder will set it from this parameter value.

### `default_fallback` {docsify-ignore}

If you'll don't set `fallback` for Message Attachment DTO, message builder will set it from this parameter value.

> **Fallback** is a plain-text summary of the attachment. This text will be used in clients that don't show formatted text (eg. IRC, mobile notifications) and should not contain any markup.
> [Read more in Slack API Documentation](https://api.slack.com/docs/message-attachments)

### `colors` {docsify-ignore}

You can specify your own color codes (HEX) for attachments left border color. You can set HEX codes for next styles: `default`, `info`, `warning`, `success` and `danger`.

### `templates` {docsify-ignore}

You should specify parameters for each template message you'll create. Required parameters: `username`, `channel` and `icon`.

> [!NOTE|label:Read more]
> about [template messages](https://google.com)
