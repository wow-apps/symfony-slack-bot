![SlackBot banner](https://wow-apps.github.io/symfony-slack-bot/assets/images/symfony_slack_bot_banner_4_brand.png)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9e427ba8-ceee-47a4-aeef-a788b9875064/big.png)](https://insight.sensiolabs.com/projects/9e427ba8-ceee-47a4-aeef-a788b9875064)

[![Packagist version](https://img.shields.io/packagist/v/wow-apps/symfony-slack-bot.svg?style=popuot&label=Packagist%20version)](https://packagist.org/packages/wow-apps/symfony-slack-bot)
[![Packagist Downloads](https://img.shields.io/packagist/dt/wow-apps/symfony-slack-bot.svg?style=popuot&label=Packagist%20downloads)](https://packagist.org/packages/wow-apps/symfony-slack-bot)

[![Maintainability](https://api.codeclimate.com/v1/badges/0d4949059680c44b33ba/maintainability)](https://codeclimate.com/github/wow-apps/symfony-slack-bot/maintainability)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ce3fffd811f2463a94ed4065a341885a)](https://app.codacy.com/app/lion-samara/symfony-slack-bot?utm_source=github.com&utm_medium=referral&utm_content=wow-apps/symfony-slack-bot&utm_campaign=Badge_Grade_Dashboard)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/?branch=master)

[![Travis CI Build](https://img.shields.io/travis/wow-apps/symfony-slack-bot.svg?style=popuot&label=Travis%20CI%20build)](https://travis-ci.org/wow-apps/symfony-slack-bot)
[![Scrutinizer Build](https://img.shields.io/scrutinizer/build/g/wow-apps/symfony-slack-bot.svg?style=popout&label=Scrutinizer%20build)](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/?branch=master)
[![ContinuousPHP Build](https://img.shields.io/continuousphp/git-hub/wow-apps/symfony-slack-bot/master.svg?style=popout&label=ContinuousPHP%20build)](https://app.continuousphp.com/git-hub/wow-apps/symfony-slack-bot)

[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/wow-apps/symfony-slack-bot.svg?style=popout&label=Code%20coverage)](https://scrutinizer-ci.com/g/wow-apps/symfony-slack-bot/?branch=master)

> Version 5 is coming this November. It will require PHP 7.1 and support Symfony 4 and 5 (Symfony 3 users can stay on version 4 of bundle) 

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
        "wow-apps/symfony-slack-bot": "^4.0"
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

> see more about [override default parameters](https://wow-apps.github.io/symfony-slack-bot/docs/#/4x/configuring?id=override-default-parameters)

## Send test message:

To test your configuration, send test message by next command:

```bash
./bin/console wowapps:slackbot:test
```

![Test command result preview](https://wow-apps.github.io/symfony-slack-bot/assets/images/docs/testing-1.jpg)


# Documentation
* Actual version [4.x](https://wow-apps.github.io/symfony-slack-bot/docs/)
* Unmaintained version [3.x](https://wow-apps.github.io/symfony-slack-bot/docs/#/3x/installation)
    
# News and updates

Follow news and updates in my Telegram channel [@wow_apps_pro](https://t.me/wow_apps_pro) or Twitter [@alexey_samara_](https://twitter.com/alexey_samara_)

# Say thanks

I don't ask for donates, I do what I do for free, for all development community. But I will be grateful if you inform me on the email in which project you are using this Bundle, as well as I will be glad to criticize and suggestions. 

![e-mail](https://img.shields.io/badge/e--mail%3A-lion.samara%40gmail.com-lightgrey.svg?style=flat-square)

# License

[MIT](https://github.com/wow-apps/symfony-slack-bot/blob/master/LICENSE) © 2016 - 2019 [Alexey Samara](https://wow-apps.pro) & [contributors](https://github.com/wow-apps/symfony-slack-bot/graphs/contributors)

# Contribute

Do you want to make a change? Pull requests are welcome.
