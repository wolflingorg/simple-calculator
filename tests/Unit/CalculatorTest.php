<?php
namespace tests\Unit;

use \PHPUnit\Framework\TestCase;
use src\Calculator;
use src\Commands\SumCommand;

class CalculatorTest extends TestCase
{
    public function testSumCommand()
    {
        $calc = new Calculator();
        $calc->addCommand('+', new SumCommand());

        $result = $calc->setValue(5)->compute('+', 5)->getResult();
        $this->assertEquals(10, $result);
    }

    public function testUndoMethod()
    {
        $calc = new Calculator();
        $calc->addCommand('+', new SumCommand());

        $result = $calc->setValue(5)->compute('+', 5)->getResult();
        $this->assertEquals(10, $result);

        $result = $calc->undo()->getResult();
        $this->assertEquals(5, $result);
    }
}