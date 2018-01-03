# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [3.2.4] - 2018-01-03
### Changed
Travis-CI configuration

## [3.2.3] - 2017-12-30
### Changed
README file for Symfony 4 support

## [3.2.2] - 2017-12-29
### Changed
Full support for auto configuring bundle in Symfony Flex

## [3.2.0] - 2017-12-11
### Removed
symfony/symfony dependency for Symfony Flex

## [3.1.3] - 2017-12-11
### Changed
Licence from Apache 2 to MIT for Symfony Flex

## [3.1.1] - 2017-12-06
### Changed
Namespaces from `Wowapps` to `WowApps` for a single standard of all my Bundles

## [3.1.0] - 2017-12-05
### Added
- Compatibility for Symfony 3.1 up to 4.0 ([issue #1](https://github.com/wow-apps/symfony-slack-bot/issues/1))
- Message validation
- Custom exceptions
- Travis CI tests
- Missing phpDocs

### Changed
- Config parameter from `wowapps_slack` to `wow_apps_slack` for a single standard of all my Bundles
- Test command from `slackbot:test` to `wowapps:slackbot:test` for a single standard of all my Bundles

### Removed
- Unused Controller
- Empty tests
