# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nickcheek/privacy-wrapper.svg?style=flat-square)](https://packagist.org/packages/nickcheek/privacy-wrapper)
[![Build Status](https://img.shields.io/travis/nickcheek/privacy-wrapper/master.svg?style=flat-square)](https://travis-ci.org/nickcheek/privacy-wrapper)
[![Quality Score](https://img.shields.io/scrutinizer/g/nickcheek/privacy-wrapper.svg?style=flat-square)](https://scrutinizer-ci.com/g/nickcheek/privacy-wrapper)
[![Total Downloads](https://img.shields.io/packagist/dt/nickcheek/privacy-wrapper.svg?style=flat-square)](https://packagist.org/packages/nickcheek/privacy-wrapper)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require nickcheek/privacy-wrapper
```

## Usage

``` php
// Include the library and then call it

$privacy = new PrivacyWrapper('83c56ade-f2ab-4069-b7a1-672e71b40afa');

var_dump($privacy->User()->enroll($first_name, $last_name, $dob, $street1, $street2 = null, $zipcode, $ssn_last_four, $phone_number = null, $email = null));

//Note: dob should be as an ISO 8601 date, phone should be in E.164 format


//Funding Methods
var_dump($privacy->Funding()->addBank($routingNumber, $accountNumber, $accountName));
var_dump($privacy->Funding()->listFundingSources());
var_dump($privacy->Funding()->listFundingBanks());
var_dump($privacy->Funding()->listFundingCards());

//Card Methods

var_dump($privacy->Card()->createCard($token = '', $type = 'SINGLE_USE',  $spend_limit = 10000, $limit_duration = 'FOREVER', $state = 'OPEN'));
var_dump($privacy->Card()->updateCard($card_token, $memo = null, $state = 'OPEN', $funding_token = '',  $spend_limit = 10000, $spend_limit_duration = 'FOREVER'));
var_dump($privacy->Card()->listCards());

// Note:
// Available Types: SINGLE_USE, MERCHANT_LOCKED, UNLOCKED
// Available Spend Limit Duration: TRANSACTION, MONTHLY, ANNUALLY, FOREVER
// Available State: OPEN, PAUSED



```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email nick@nicholascheek.com instead of using the issue tracker.

## Credits

- [Nicholas Cheek](https://github.com/nickcheek)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).