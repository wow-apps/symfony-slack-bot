# Installation

!> **Symfony Slack Bot bundle requires:** PHP 7.0+; Symfony 3.0+; Guzzle Client 6.0+

<!-- tabs:start -->

#### ** Symfony 3 **

### Step 1: Download the Bundle {docsify-ignore}

```bash
composer require wow-apps/symfony-slack-bot 
```

or add entry to your `composer.json` file:
```json
"require": {
        "wow-apps/symfony-slack-bot": "^3.2"
}
```

### Step 2: Enable the Bundle {docsify-ignore}
Edit your `app/AppKernel.php` file
```php
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


### Step 3: Add configuration {docsify-ignore}

```yaml
# SlackBot Configuration
wow_apps_slack:
    api_url: ""
    default_icon: "//cdn.wow-apps.pro/slackbot/slack-bot-icon-48.png"
    default_channel: "general"
    quote_color:
        default: "#607D8B"
        info: "#2196F3"
        warning: "#FF5722"
        success: "#8BC34A"
        danger: "#F44336"
```

#### ** Symfony 4 **

### Step 1: Download the Bundle {docsify-ignore}

```bash
composer require wow-apps/symfony-slack-bot 
```

or add entry to your `composer.json` file:
```json
"require": {
        "wow-apps/symfony-slack-bot": "^3.2"
}
```

<!-- tabs:end -->

# Send test message {docsify-ignore}
To test your configuration, send test message by next command:
```bash
php ./bin/console wowapps:slackbot:test
```
![Test command result preview](http://cdn.wow-apps.pro/slackbot/slackbot_preview-v2.jpg)