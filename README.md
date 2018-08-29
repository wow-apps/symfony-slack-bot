![SlackBot banner](http://cdn.wow-apps.pro/slackbot/symfony-slack-bot-banner-v2.png)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9e427ba8-ceee-47a4-aeef-a788b9875064/big.png)](https://insight.sensiolabs.com/projects/9e427ba8-ceee-47a4-aeef-a788b9875064)

[![Packagist version](https://img.shields.io/packagist/v/wow-apps/symfony-slack-bot.svg?style=popuot&label=Packagist%20version)](https://packagist.org/packages/wow-apps/symfony-slack-bot)
[![Packagist Downloads](https://img.shields.io/packagist/dt/wow-apps/symfony-slack-bot.svg?style=popuot&label=Packagist%20downloads)](https://packagist.org/packages/wow-apps/symfony-slack-bot)

[![Maintainability](https://api.codeclimate.com/v1/badges/0d4949059680c44b33ba/maintainability)](https://codeclimate.com/github/wow-apps/symfony-slack-bot/maintainability)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ce3fffd811f2463a94ed4065a341885a)](https://app.codacy.com/app/lion-samara/symfony-slack-bot?utm_source=github.com&utm_medium=referral&utm_content=wow-apps/symfony-slack-bot&utm_campaign=Badge_Grade_Dashboard)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/?branch=master)

[![Travis CI Build](https://img.shields.io/travis/wow-apps/symfony-slack-bot.svg?style=popuot&label=Travis%20CI%20build)](https://travis-ci.org/wow-apps/symfony-slack-bot)
[![Scrutinizer Build](https://img.shields.io/scrutinizer/build/g/wow-apps/symfony-slack-bot.svg?style=popout&label=Scrutinizer%20build)](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/?branch=master)
[![ContinuousPHP Build](https://img.shields.io/continuousphp/git-hub/wow-apps/symfony-slack-bot/master.svg?style=popout&label=ContinuousPHP%20build)](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/?branch=master)

[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/wow-apps/symfony-slack-bot.svg?style=popout&label=Code%20coverage)](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/?branch=master)

# Symfony Slack Bot

Simple Symfony 3 and 4 Bundle for sending customizable messages to Slack via [incoming webhooks](https://api.slack.com/incoming-webhooks).

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

![Test command result preview](http://cdn.wow-apps.pro/slackbot/slackbot_preview-v2.jpg)


# Documentation

* [Home](https://github.com/wow-apps/symfony-slack-bot/wiki)
    * [Installation](https://github.com/wow-apps/symfony-slack-bot/wiki/1.-Installation)
    * [Using SlackBot](https://github.com/wow-apps/symfony-slack-bot/wiki/2.-Using-SlackBot)
    * [Additional helpers](https://github.com/wow-apps/symfony-slack-bot/wiki/3.-Additional-helpers)
    
# News and updates:

Follow news and updates in my Telegram channel [@wow_apps_pro](https://t.me/wow_apps_pro) or Twitter [@alexey_samara_](https://twitter.com/alexey_samara_)

# Say thanks:

I don't ask for donates, I do what I do for free, for all development community. But I will be grateful if you inform me on the email in which project you are using this Bundle, as well as I will be glad to criticize and suggestions. 

![e-mail](https://img.shields.io/badge/e--mail%3A-lion.samara%40gmail.com-lightgrey.svg?style=flat-square)

# License

[MIT](https://github.com/wow-apps/symfony-slack-bot/blob/master/LICENSE) © 2016 - 2018 [Alexey Samara](https://wow-apps.pro) & [contributors](https://github.com/wow-apps/symfony-slack-bot/graphs/contributors)

# Contribute

Do you want to make a change? Pull requests are welcome.

# Changelog of 3rd version:

## Added
* [3.2.8] More test coverage
* [3.2.7] Template for new pull request
* [3.2.7] PHPUnit configuration
* [3.2.6] phpunit test for Traits
* [3.2.6] Templates for creating an issue
* [3.1.0] Compatibility for Symfony 3.1 up to 4.0 ([issue #1](https://github.com/wow-apps/symfony-slack-bot/issues/1))
* [3.1.0] Message validation
* [3.1.0] Custom exceptions
* [3.1.0] Travis CI tests
* [3.1.0] Missing phpDocs
    
## Changed
* [3.2.8] TravisCI configuration
* [3.2.8] Little optimisation for Scrutinizer
* [3.2.8] Little optimisation for Codacy
* [3.2.7] TravisCI configuration
* [3.2.6] Fixed wrong using of custom exception
* [3.2.6] TravisCI configuration
* [3.2.5] Fixed problem with missed services.yaml file ([Issue #3](https://github.com/wow-apps/symfony-slack-bot/issues/3))
* [3.2.4] TravisCI configuration
* [3.2.3] README file for Symfony 4 support
* [3.2.2] Support for auto configuring bundle in Symfony Flex
* [3.1.3] Licence from Apache 2 to MIT for Symfony Flex
* [3.1.1] Namespaces from `Wowapps` to `WowApps` for a single standard of all my Bundles (hot fix for 3.1.0)
* [3.1.0] Config parameter from `wowapps_slack` to `wow_apps_slack` for a single standard of all my Bundles
* [3.1.0] Test command from `slackbot:test` to `wowapps:slackbot:test` for a single standard of all my Bundles

## Removed
* [3.2.0] symfony/symfony dependency for Symfony Flex
* [3.1.0] Unused Controller
* [3.1.0] Empty tests
