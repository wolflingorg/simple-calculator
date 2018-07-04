# Simple programmable calculator

### Requirements

* PHP ^7.1
* XDebug (https://xdebug.org/docs/install)

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

## Tasks

* Create unit tests for `src\Commands\SubCommand`
* Create at least 3 new commands and cover them with unit tests
* Fulfil all empty methods in the `CalculatorTest`
