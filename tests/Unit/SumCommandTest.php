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
     * @see http://phpunit.readthedocs.io/en/7.1/fixtures.html#more-setup-than-teardown
     */
    public function setUp()
    {
        $this->command = new SumCommand();
    }

    /**
     * @return array
     */
    public function sumPositiveDataProvider()
    {
        return [
            [1, 1, 2],
            [0.1, 0.1, 0.2],
            [-1, 2, 1],
        ];
    }

    /**
     * @dataProvider sumPositiveDataProvider
     */
    public function testSumPositive($a, $b, $expected)
    {
        $result = $this->command->execute($a, $b);

        $this->assertEquals($expected, $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSumNegative()
    {
        $this->command->execute(1);
    }

    /**
     * @see http://phpunit.readthedocs.io/en/7.1/fixtures.html#more-setup-than-teardown
     */
    public function tearDown()
    {
        unset($this->command);
    }
}
