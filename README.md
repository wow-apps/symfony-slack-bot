|  |
|:---:|
| [![SlackBot for Symfony 3](http://604235.webartua.web.hosting-test.net/slackbot-banner-3.jpg)](https://github.com/wow-apps/symfony-slack-bot) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/b59b8715-1ba6-4572-8b46-9866d6318d21/big.png)](https://insight.sensiolabs.com/projects/b59b8715-1ba6-4572-8b46-9866d6318d21) |
|  |
|  [![GitHub license](https://img.shields.io/badge/license-Apache%202-blue.svg?style=flat-square)](https://raw.githubusercontent.com/wow-apps/symfony-slack-bot/master/LICENSE) |
|  |

[![PHP version](https://img.shields.io/badge/PHP-%5E7.0-blue.svg?style=flat-square)](http://php.net/manual/ru/migration70.new-features.php)
[![Symfony version](https://img.shields.io/badge/Symfony-%5E3.0-green.svg?style=flat-square)](http://symfony.com/)
[![Packagist Pre Release](https://img.shields.io/packagist/v/wow-apps/symfony-slack-bot.svg?maxAge=2592000?style=flat-square)](https://packagist.org/packages/wow-apps/symfony-slack-bot)
[![AppVeyor](https://img.shields.io/appveyor/ci/gruntjs/grunt.svg?maxAge=2592000?style=flat-square)]()

[![Coding Style](https://img.shields.io/badge/Coding%20Style-PSR--2-brightgreen.svg)](http://www.php-fig.org/psr/psr-2/)
[![Code Climate](https://codeclimate.com/github/wow-apps/symfony-slack-bot/badges/gpa.svg)](https://codeclimate.com/github/wow-apps/symfony-slack-bot)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ce3fffd811f2463a94ed4065a341885a)](https://www.codacy.com/app/lion-samara/symfony-slack-bot?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=wow-apps/symfony-slack-bot&amp;utm_campaign=Badge_Grade)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b59b8715-1ba6-4572-8b46-9866d6318d21/mini.png)](https://insight.sensiolabs.com/projects/b59b8715-1ba6-4572-8b46-9866d6318d21)
[![Twitter](https://img.shields.io/twitter/url/https/github.com/wow-apps/symfony-slack-bot.svg?style=social?style=flat-square)](https://twitter.com/intent/tweet?text=SlackBot+for+Symfony+3&url=%5Bobject%20Object%5D)


## Installation:

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
        new WowApps\SlackBotBundle\WowAppsSlackBotBundle()
    );

    // ...

    return $bundles
}
```


### Step 3: Add configuration

```yaml
# SlackBot Configuration
wow_apps_slack_bot:
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

## Test configuration

You can check your configuration by send test message:

`php ./bin/console slackbot:test`


# Documentation

* [Home](https://github.com/wow-apps/symfony-slack-bot/wiki)
    * [Installation](https://github.com/wow-apps/symfony-slack-bot/wiki/1.-Installation)
    * [Using SlackBot](https://github.com/wow-apps/symfony-slack-bot/wiki/2.-Using-SlackBot)
    * [Additional helpers](https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers)
