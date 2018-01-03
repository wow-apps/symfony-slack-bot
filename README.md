![SlackBot banner](http://cdn.wow-apps.pro/slackbot/symfony-slack-bot-banner-v2.png)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9e427ba8-ceee-47a4-aeef-a788b9875064/big.png)](https://insight.sensiolabs.com/projects/9e427ba8-ceee-47a4-aeef-a788b9875064)

[![Packagist Pre Release](https://img.shields.io/packagist/v/wow-apps/symfony-slack-bot.svg?maxAge=2592000&style=flat-square)](https://packagist.org/packages/wow-apps/symfony-slack-bot)
[![Packagist](https://img.shields.io/packagist/dt/wow-apps/symfony-slack-bot.svg?style=flat-square)](https://packagist.org/packages/wow-apps/symfony-slack-bot)
[![Travis](https://img.shields.io/travis/wow-apps/symfony-slack-bot.svg?style=flat-square)](https://travis-ci.org/wow-apps/symfony-slack-bot)
[![Code Climate](https://img.shields.io/codeclimate/maintainability/wow-apps/symfony-slack-bot.svg?style=flat-square)](https://codeclimate.com/github/wow-apps/symfony-slack-bot)
[![Codacy grade](https://img.shields.io/codacy/grade/ce3fffd811f2463a94ed4065a341885a.svg?style=flat-square)](https://www.codacy.com/app/lion-samara/symfony-slack-bot)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/wow-apps/symfony-slack-bot.svg?style=flat-square)](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/?branch=master)
[![Scrutinizer Build](https://img.shields.io/scrutinizer/build/g/wow-apps/symfony-slack-bot.svg?style=flat-square)](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/?branch=master)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/9e427ba8-ceee-47a4-aeef-a788b9875064.svg?style=flat-square)](https://insight.sensiolabs.com/projects/9e427ba8-ceee-47a4-aeef-a788b9875064)


# Symfony Slack Bot

Simple Symfony 3 and 4 Bundle for sending customizeable messages to Slack via [incoming webhooks](https://api.slack.com/incoming-webhooks).

## Requires:

* PHP 7.0+
* Symfony 3.0+
* Guzzle Client 6.0+

## Installation:

### Step 1: Download the Bundle

```json
"require": {
        "wow-apps/symfony-slack-bot": "^3.2"
}
```

or

```bash
$ composer require wow-apps/symfony-slack-bot 
```

### Step 2: Enable the Bundle (skip for Symfony 4)

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


### Step 3: Add configuration (skip for Symfony 4)

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

## Send test message:

To test your configuration, send test message by next command:

```bash
./bin/console wowapps:slackbot:test
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

* 3.2.4
    * Changed Travis-CI configuration

* 3.2.3
    * Changed README file for Symfony 4 support

* 3.2.2
    * Changed support for auto configuring bundle in Symfony Flex

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

# License

[MIT](https://github.com/wow-apps/symfony-slack-bot/blob/master/LICENSE) © 2016 - 2018 [Alexey Samara](https://wow-apps.pro) & [contributors](https://github.com/wow-apps/symfony-slack-bot/graphs/contributors)

# Contribute

Do you want to make a change? Pull requests are welcome.