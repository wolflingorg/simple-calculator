# Simple programmable calculator

### Requirements

* PHP ^7.1
* XDebug (https://xdebug.org/docs/install)
* Composer

### How to install

* Clone repository
* Run `composer install`

### How to use Calculator

```php
<?php

use src\Calculator;
use src\Commands\SubCommand;
use src\Commands\SumCommand;

$calc = new Calculator();
$calc->addCommand('+', new SumCommand());
$calc->addCommand('-', new SubCommand());

echo $calc->init(1)
    ->compute('+', 5)
    ->compute('-', 3)
    ->undo()
    ->undo()
    ->getResult();
```

More examples can be found in the `./example.php`

## Tasks testing

* Create unit tests for `src\Commands\SubCommand`
* Create at least 3 new commands (multiplication, division, exponentiation) and cover them with unit tests
* Fulfil all empty methods in the `CalculatorTest`

## Tasks programming

* Implement operations priorities so that example below will work correctly:

```php
<?php

echo $calc->init(2)
    ->compute('+', 2)
    ->compute('*', 3)
    ->getResult();

// MUST return 8 NOT 12
```

