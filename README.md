# PasswordGen

PHP library for generating random passwords within given requirement parameters.

## Install

Via Composer

``` bash
$ composer require domainregistrar/PasswordGenerator
```

## Basic usage

Generate password with length of 16 including upper & lower case letters, numbers and special characters.

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