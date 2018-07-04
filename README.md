# Simple programmable calculator

### How to use

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

You can add your own commands to the `./src/Commands/`

More examples can be found in the `./example.php`
