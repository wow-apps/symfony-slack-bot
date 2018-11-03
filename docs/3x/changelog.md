# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [3.2.12] - 2018-10-09
### Changed {docsify-ignore}
- Fixed setting of message icon ([Issue #9](https://github.com/wow-apps/symfony-slack-bot/issues/9))
- Functions `setIcon` and `getIcon` for SlackBot DTO set as deprecated and will be removed in version 3.3 ([Issue #9](https://github.com/wow-apps/symfony-slack-bot/issues/9))
- Test command now send message with random emoji as icon

### Added {docsify-ignore}
- Functions `getIconUrl`, `setIconUrl`, `getIconEmoji` and `setIconEmoji`
- Class `SlackEmoji` with many constants of Slack emojis
- Flag `JSON_UNESCAPED_SLASHES` for outgoing message body ([Issue #9](https://github.com/wow-apps/symfony-slack-bot/issues/9))
- Emoji format validator
- Some new tests

## [3.2.11] - 2018-09-06
### Changed {docsify-ignore}
- Fixed bug. Messages always goes to default channel before

## [3.2.10] - 2018-09-04
### Changed {docsify-ignore}
- Some cosmetic changes

## [3.2.9] - 2018-09-01
### Added {docsify-ignore}
- All public methods was covered by tests

## [3.2.8] - 2018-08-29
### Added {docsify-ignore}
- More test coverage

### Changed {docsify-ignore}
- Fixed Travis CI configuration
- Little optimisation for Scrutinizer
- Little optimisation for Codacy

## [3.2.7] - 2018-08-23
### Added {docsify-ignore}
- Template for new pull request
- PHPUnit configuration

### Changed {docsify-ignore}
- TravisCI configuration

## [3.2.6] - 2018-08-23
### Added {docsify-ignore}
- phpunit test for Traits
- templates for creating an issue

### Changed {docsify-ignore}
- TravisCI configuration
- Fixed wrong using of custom exception

## [3.2.5] - 2018-08-22
### Changed {docsify-ignore}
- Fixed problem with missed services.yaml file ([Issue #3](https://github.com/wow-apps/symfony-slack-bot/issues/3))

## [3.2.4] - 2018-01-03
### Changed {docsify-ignore}
- Travis-CI configuration

## [3.2.3] - 2017-12-30
### Changed {docsify-ignore}
- README file for Symfony 4 support

## [3.2.2] - 2017-12-29
### Changed {docsify-ignore}
- Full support for auto configuring bundle in Symfony Flex

## [3.2.0] - 2017-12-11
### Removed {docsify-ignore}
- symfony/symfony dependency for Symfony Flex

## [3.1.3] - 2017-12-11
### Changed {docsify-ignore}
- Licence from Apache 2 to MIT for Symfony Flex

## [3.1.1] - 2017-12-06
### Changed {docsify-ignore}
- Namespaces from `Wowapps` to `WowApps` for a single standard of all my Bundles

## [3.1.0] - 2017-12-05
### Added {docsify-ignore}
- Compatibility for Symfony 3.1 up to 4.0 ([issue #1](https://github.com/wow-apps/symfony-slack-bot/issues/1))
- Message validation
- Custom exceptions
- Travis CI tests
- Missing phpDocs

### Changed {docsify-ignore}
- Config parameter from `wowapps_slack` to `wow_apps_slack` for a single standard of all my Bundles
- Test command from `slackbot:test` to `wowapps:slackbot:test` for a single standard of all my Bundles

### Removed {docsify-ignore}
- Unused Controller
- Empty tests
