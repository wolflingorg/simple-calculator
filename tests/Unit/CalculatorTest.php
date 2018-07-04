<?php
namespace tests\Unit;

use \PHPUnit\Framework\TestCase;
use src\Calculator;

class CalculatorTest extends TestCase
{
    /**
     * @var Calculator
     */
    private $calculator;

    /**
     * TODO: explain difference between setUp() and tearDown()
     * TODO: what difference between setUp() and setUpBeforeClass()
     *
     * @see http://phpunit.readthedocs.io/en/7.1/fixtures.html#more-setup-than-teardown
     */
    public function setUp()
    {
        $this->calculator = new Calculator();
    }

    /**
     * TODO: Which methods should be mocked for calculator?
     *
     * @return \PHPUnit\Framework\MockObject\MockBuilder
     */
    public function getCalculatorMock(){
        return $this->getMockBuilder(Calculator::class);
    }

    public function testCompute()
    {

    }

    /**
     * TODO: How to check whether it works?
     */
    public function testAddCommand()
    {

    }

    public function testGetResult()
    {

    }

    /**
     * TODO: How to check whether it works?
     */
    public function testInit()
    {

    }

    public function testRedo()
    {

    }

    public function testUndo()
    {

    }

    /**
     * TODO: what difference between tearDown() and tearDownAfterClass()
     * @see http://phpunit.readthedocs.io/en/7.1/fixtures.html#more-setup-than-teardown
     */
    public function tearDown()
    {
        unset($this->calculator);
    }
}
