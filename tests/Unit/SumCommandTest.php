<?php
namespace tests\Unit;

use \PHPUnit\Framework\TestCase;
use src\Commands\SumCommand;

class SumCommandTest extends TestCase
{
    /**
     * @var SumCommand
     */
    private $command;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $this->command = new SumCommand();
    }

    /**
     * @return array
     */
    public function commandPositiveDataProvider()
    {
        return [
            [1, 1, 2],
            [0.1, 0.1, 0.2],
            [-1, 2, 1],
            ['5', 10, 15],
        ];
    }

    /**
     * @dataProvider commandPositiveDataProvider
     */
    public function testCommandPositive($a, $b, $expected)
    {
        $result = $this->command->execute($a, $b);

        $this->assertEquals($expected, $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCommandNegative()
    {
        $this->command->execute(1);
    }

    /**
     * @inheritdoc
     */
    public function tearDown()
    {
        unset($this->command);
    }
}
