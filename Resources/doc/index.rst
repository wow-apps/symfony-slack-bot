### Requires:

* PHP 7.0+
* Symfony 3.0+
* Guzzle Client 6.0+

### Step 1: Download the Bundle

```json
"require": {
        "wow-apps/symfony-slack-bot": "^1.0.0"
}
```

or

```bash
$ composer require wow-apps/symfony-slack-bot
```

### Step 2: Enable the Bundle

```php
// ./app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new WowApps\SlackBundle\WowAppsSlackBundle(),
    );

    // ...

    return $bundles
}
```


### Step 3: Add configuration

```yaml
# SlackBot Configuration
wow_apps_slack:
    api_url: ""
    default_icon: "http://cdn.wow-apps.pro/slackbot/slack-bot-icon-48.png"
    default_channel: "general"
    quote_color:
        default: "#607D8B"
        info: "#2196F3"
        warning: "#FF5722"
        success: "#8BC34A"
        danger: "#F44336"
```

### Send test message:

To test your configuration, send test message by next command:

```bash
php ./bin/console wowapps:slackbot:test
```

![Test command result preview](http://cdn.wow-apps.pro/slackbot/slackbot_preview.jpg)
