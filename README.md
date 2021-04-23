# Password Generator

PHP library for generating random passwords within given requirement parameters.

You are able to specify if upper/lower case characters should be included, the number of integers and special characters, and the total length required.

## Requirements 
* PHP >= 7.4
* phpunit/phpunit >= 9.5.*

## Installation

Install via `Composer` using the [Packagist archive](https://packagist.org/packages/domainregistrar/password-generator)

``` bash
$ composer require domainregistrar/password-generator
```

## Basic usage

The generate method accepts 5 parameters:
* total length of password
* boolean to include Uppercase characters
* boolean to include Lowercase characters
* total numbers to include in the password
* total special characters (`@%!?*^&`) to include in the password

``` php
use domainregistrar\PasswordGenerator\PasswordGen;

// output example: B^XUfZXXRSpY5FOpVV7V*R4^
$password = PasswordGen::generate(24, true, true, 3, 3);

// output example: Az
$password = PasswordGen::generate(2, true, true, 0, 0);

// output example: Q?tMHcSOe^cGTmeSObaakvY@
$password = PasswordGen::generate(24, true, true, 0, 3);

// output example: D79MFMAwfr
$password = PasswordGen::generate(10, true, true, 2, 0);
```

## Testing
``` bash
$ php vendor/bin/phpunit
```