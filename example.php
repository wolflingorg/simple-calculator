<?php
require_once './vendor/autoload.php';

use src\Calculator;
use src\Commands\SubCommand;
use src\Commands\SumCommand;

$calc = new Calculator();
$calc->addCommand('+', new SumCommand());
$calc->addCommand('-', new SubCommand());

// You can use any operation for computing
// will output 2
echo $calc->init(1)
    ->compute('+', 1)
    ->getResult();

echo "\n";

// Multiply operations
// will output 10
echo $calc->init(15)
    ->compute('+', 5)
    ->compute('-', 10)
    ->getResult();

echo "\n";

// Calculator also support REDO operation
// will output 4
echo $calc->init(1)
    ->compute('+', 1)
    ->redo()
    ->redo()
    ->getResult();

echo "\n";

// Calculator also support UNDO operation
// will output 1
echo $calc->init(1)
    ->compute('+', 5)
    ->compute('+', 5)
    ->undo()
    ->undo()
    ->getResult();

echo "\n";
