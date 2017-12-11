![SlackBot banner](http://cdn.wow-apps.pro/slackbot/slackbot-banner.jpg)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9e427ba8-ceee-47a4-aeef-a788b9875064/big.png)](https://insight.sensiolabs.com/projects/9e427ba8-ceee-47a4-aeef-a788b9875064)

[![Packagist Pre Release](https://img.shields.io/packagist/v/wow-apps/symfony-slack-bot.svg?maxAge=2592000?style=flat-square)](https://packagist.org/packages/wow-apps/symfony-slack-bot)
[![Packagist](https://img.shields.io/packagist/dt/wow-apps/symfony-slack-bot.svg)](https://packagist.org/packages/wow-apps/symfony-slack-bot)
[![Build Status](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/badges/build.png?b=master)](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/build-status/master)
[![PHP version](https://img.shields.io/badge/PHP-%5E7.0-blue.svg?style=flat-square)](http://php.net/manual/ru/migration70.new-features.php)
[![Symfony version](https://img.shields.io/badge/Symfony-%5E3.0-green.svg?style=flat-square)](http://symfony.com/)
[![GitHub license](https://img.shields.io/badge/license-Apache%202-blue.svg?style=flat-square)](https://raw.githubusercontent.com/wow-apps/symfony-slack-bot/master/LICENSE)
[![Coding Style](https://img.shields.io/badge/Coding%20Style-PSR--2-brightgreen.svg)](http://www.php-fig.org/psr/psr-2/)
[![Code Climate](https://codeclimate.com/github/wow-apps/symfony-slack-bot/badges/gpa.svg)](https://codeclimate.com/github/wow-apps/symfony-slack-bot)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ce3fffd811f2463a94ed4065a341885a)](https://www.codacy.com/app/lion-samara/symfony-slack-bot?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=wow-apps/symfony-slack-bot&amp;utm_campaign=Badge_Grade)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9e427ba8-ceee-47a4-aeef-a788b9875064/mini.png)](https://insight.sensiolabs.com/projects/9e427ba8-ceee-47a4-aeef-a788b9875064)


# SlackBot for Symfony 3

Simple Symfony 3 Bundle for sending messages to Slack via [incoming webhooks](https://api.slack.com/incoming-webhooks).

## Installation:

### Requires:

* PHP 7.0+
* Symfony 3.0+
* Guzzle Client 6.0+

### Step 1: Download the Bundle

```json
"require": {
        "wow-apps/symfony-slack-bot": "^3"
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

## Send test message:

To test your configuration, send test message by next command:

```bash
php ./bin/console wowapps:slackbot:test
```

![Test command result preview](http://cdn.wow-apps.pro/slackbot/slackbot_preview.jpg)


# Documentation

* [Home](https://github.com/wow-apps/symfony-slack-bot/wiki)
    * [Installation](https://github.com/wow-apps/symfony-slack-bot/wiki/1.-Installation)
    * [Using SlackBot](https://github.com/wow-apps/symfony-slack-bot/wiki/2.-Using-SlackBot)
    * [Additional helpers](https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers)
    
# News and updates:

Follow news and updates in my Telegram channel [@wow_apps_pro](https://t.me/wow_apps_pro) or Twitter [@alexey_samara_](https://twitter.com/alexey_samara_)

# Changelog:

* 3.2.0
    * Removed symfony/symfony dependency for Symfony Flex

* 3.1.3
    * Changed licence from Apache 2 to MIT for Symfony Flex

* 3.1.1 (**hot fix for 3.1.0**)
    * Changed namespaces from `Wowapps` to `WowApps` for a single standard of all my Bundles

* 3.1.0
    * Added compatibility for Symfony 3.1 up to 4.0 ([issue #1](https://github.com/wow-apps/symfony-slack-bot/issues/1))
    * Added message validation
    * Added custom exceptions
    * Added Travis CI tests
    * Added missing phpDocs
    * Changed config parameter from `wowapps_slack` to `wow_apps_slack` for a single standard of all my Bundles
    * Changed test command from `slackbot:test` to `wowapps:slackbot:test` for a single standard of all my Bundles
    * Removed unused Controller
    * Removed empty tests
