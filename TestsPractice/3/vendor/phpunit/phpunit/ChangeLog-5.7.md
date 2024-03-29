# Changes in PHPUnit 5.7

All notable changes of the PHPUnit 5.7 release series are documented in this file using the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## [5.7.9] - 2017-01-28

### Fixed

* Fixed [#2447](https://github.com/sebastianbergmann/phpunit/issues/2447): Reverted backwards incompatible change to handling of boolean environment variable values specified in XML

## [5.7.8] - 2017-01-26

### Fixed

* Fixed [#2446](https://github.com/sebastianbergmann/phpunit/issues/2446): Reverted backwards incompatible change to exit code in case of warnings

## [5.7.7] - 2017-01-25

### Fixed

* Fixed [#1896](https://github.com/sebastianbergmann/phpunit/issues/1896): Wrong test location when `@depends` and `@dataProvider` are combined
* Fixed [#1983](https://github.com/sebastianbergmann/phpunit/pull/1983): Tests with `@expectedException` annotation cannot be skipped
* Fixed [#2137](https://github.com/sebastianbergmann/phpunit/issues/2137): Warnings for invalid data providers are suppressed when test execution is filtered
* Fixed [#2275](https://github.com/sebastianbergmann/phpunit/pull/2275): Invalid UTF-8 characters can lead to missing output
* Fixed [#2299](https://github.com/sebastianbergmann/phpunit/issues/2299): `expectExceptionMessage()` and `expectExceptionCode()` do not work without `expectException()`
* Fixed [#2328](https://github.com/sebastianbergmann/phpunit/issues/2328): `TestListener` callbacks `startTest()` and `endTest()` are not called when test is skipped due to `@depends`
* Fixed [#2331](https://github.com/sebastianbergmann/phpunit/issues/2331): Boolean environment variable values specified in XML get mangled
* Fixed [#2333](https://github.com/sebastianbergmann/phpunit/issues/2333): `assertContains()` and `assertNotContains()` do not handle UTF-8 strings correctly
* Fixed [#2340](https://github.com/sebastianbergmann/phpunit/pull/2340): Data providers that use `yield` or implement `Iterator` cannot be combined 
* Fixed [#2349](https://github.com/sebastianbergmann/phpunit/pull/2349): `PHPUnit_TextUI_Command` does not `exit()` when it should
* Fixed [#2392](https://github.com/sebastianbergmann/phpunit/issues/2392): Empty (but valid) data provider should skip the test
* Fixed [#2431](https://github.com/sebastianbergmann/phpunit/issues/2431): `assertArraySubset()` does not support `ArrayAccess`
* Fixed [#2435](https://github.com/sebastianbergmann/phpunit/issues/2435): Empty `@group` annotation causes error on PHP 7.2+

## [5.7.6] - 2017-01-22

### Fixed

* Fixed [#2424](https://github.com/sebastianbergmann/phpunit/issues/2424): `TestCase::getStatus()` returns `STATUS_PASSED` instead of `STATUS_RISKY` for risky test
* Fixed [#2427](https://github.com/sebastianbergmann/phpunit/issues/2427): TestDox group configuration is not handled
* Fixed [#2428](https://github.com/sebastianbergmann/phpunit/pull/2428): Nested arrays specificied in XML configuration file are not handled correctly

## [5.7.5] - 2016-12-28

### Fixed

* Fixed [#2404](https://github.com/sebastianbergmann/phpunit/pull/2404): `assertDirectoryNotIsWriteable()` calls itself

## [5.7.4] - 2016-12-13

### Fixed

* Fixed [#2394](https://github.com/sebastianbergmann/phpunit/issues/2394): Do not treat `AssertionError` as assertion failure on PHP 5

## [5.7.3] - 2016-12-09

### Fixed

* Fixed [#2384](https://github.com/sebastianbergmann/phpunit/pull/2384): Handle `PHPUnit_Framework_Exception` correctly when expecting exceptions

## [5.7.2] - 2016-12-03

### Fixed

* Fixed [#2382](https://github.com/sebastianbergmann/phpunit/issues/2382): Uncloneable test doubles passed via data provider do not work

## [5.7.1] - 2016-12-02

### Fixed

* Fixed [#2380](https://github.com/sebastianbergmann/phpunit/issues/2380): Data Providers cannot be generators anymore

## [5.7.0] - 2016-12-02

### Added

* Merged [#2223](https://github.com/sebastianbergmann/phpunit/pull/2223): Add support for multiple data providers
* Added `extensionsDirectory` configuration directive to configure a directory from which all `.phar` files are loaded as PHPUnit extensions
* Added `--no-extensions` commandline option to suppress loading of extensions (from configured extension directory)
* Added `PHPUnit\Framework\Assert` as an alias for `PHPUnit_Framework_Assert` for forward compatibility
* Added `PHPUnit\Framework\BaseTestListener` as an alias for `PHPUnit_Framework_BaseTestListener` for forward compatibility
* Added `PHPUnit\Framework\TestListener` as an alias for `PHPUnit_Framework_TestListener` for forward compatibility

### Changed

* The `--log-json` commandline option has been deprecated
* The `--tap` and `--log-tap` commandline options have been deprecated
* The `--self-update` and `--self-upgrade` commandline options have been deprecated (PHAR binary only)

[5.7.9]: https://github.com/sebastianbergmann/phpunit/compare/5.7.8...5.7.9
[5.7.8]: https://github.com/sebastianbergmann/phpunit/compare/5.7.7...5.7.8
[5.7.7]: https://github.com/sebastianbergmann/phpunit/compare/5.7.6...5.7.7
[5.7.6]: https://github.com/sebastianbergmann/phpunit/compare/5.7.5...5.7.6
[5.7.5]: https://github.com/sebastianbergmann/phpunit/compare/5.7.4...5.7.5
[5.7.4]: https://github.com/sebastianbergmann/phpunit/compare/5.7.3...5.7.4
[5.7.3]: https://github.com/sebastianbergmann/phpunit/compare/5.7.2...5.7.3
[5.7.2]: https://github.com/sebastianbergmann/phpunit/compare/5.7.1...5.7.2
[5.7.1]: https://github.com/sebastianbergmann/phpunit/compare/5.7.0...5.7.1
[5.7.0]: https://github.com/sebastianbergmann/phpunit/compare/5.6...5.7.0

