# PCLog - Logging made easy.

This is a wrapper for [PHP Console](https://github.com/barbushin/php-console):

> PHP Console allows you to handle PHP errors & exceptions, dump variables, execute PHP code remotely and many other things using [Google Chrome extension PHP Console](https://chrome.google.com/webstore/detail/php-console/nfhmhhlpfleoednkpnnnkolmclajemef) and [PhpConsole server library](https://github.com/barbushin/php-console).

This wrapper was created because the original library is confused and hard to use.

## Requirements

* [PHP Console extension](https://chrome.google.com/webstore/detail/php-console/nfhmhhlpfleoednkpnnnkolmclajemef) must be installed on Google Chrome.
* PHP 5.3 (or later) on server.

## Installation

Install the latest version with:

```
$ composer require jrdev/pclog
```

## Usage

First, setup the library:

```php
<?php
require 'vendor/autoload.php';

$pclog = new jrdev\PCLog;

// Define who can see the logs:
if (isset($_SESSION['user_logged'])) {
    $pclog->init();
}
```

Use:

```php
<?php
$pclog->debug('my new log');
```

## License

Licensed under the MIT License - see the `LICENSE` file for details
