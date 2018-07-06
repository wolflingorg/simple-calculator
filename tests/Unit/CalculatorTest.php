<?php
namespace tests\Unit;

use \PHPUnit\Framework\TestCase;
use src\Calculator;
use src\Commands\CommandInterface;

class CalculatorTest extends TestCase
{
    /**
     * @var Calculator
     */
    private $calc;

    /**
     * TODO: explain difference between setUp() and tearDown()
     * TODO: what difference between setUp() and setUpBeforeClass()
     *
     * @see http://phpunit.readthedocs.io/en/7.1/fixtures.html#more-setup-than-teardown
     */
    public function setUp()
    {
        $this->calc = new Calculator();
    }

    /**
     * TODO: Which methods should be mocked for Command?
     *
     * @see https://phpunit.readthedocs.io/en/7.1/test-doubles.html
     *
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    public function getCommandMock() {
        return $this->getMockBuilder(CommandInterface::class)
            ->getMock();
    }

    /**
     * TODO: Check whether intents = []
     * TODO: Check whether value = 0.0
     *
     * @see PHPUnit :: assertAttributeEquals
     */
    public function testInitialCalcState()
    {

    }

    /**
     * TODO: Check name exception
     *
     * @covers Calculator::addCommand()
     */
    public function testAddCommandNegative()
    {

    }

    /**
     * TODO: Check whether command is in the commands array
     *
     * @covers Calculator::addCommand()
     */
    public function testAddCommandPositive()
    {

    }

    /**
     * TODO: Check whether intents = []
     * TODO: Check whether value = expected
     *
     * @see PHPUnit :: assertAttributeEquals
     *
     * @covers Calculator::init()
     */
    public function testInit()
    {

    }

    /**
     * TODO: Check is_numeric exception
     * TODO: Check hasCommand exception
     *
     * @see PHPUnit :: dataProvider
     *
     * @covers Calculator::compute()
     */
    public function testComputeNegative()
    {

    }

    /**
     * TODO: Check whether command and arguments have appeared in the intents array
     *
     * @see PHPUnit :: assertAttributeEquals
     *
     * @covers Calculator::compute()
     */
    public function testComputePositive()
    {

    }

    /**
     * TODO: Check that command was executed
     *
     * Mock command`s execute method and check whether it was called at least once with the correct arguments
     *
     * @see https://phpunit.readthedocs.io/en/7.1/test-doubles.html
     *
     * @covers Calculator::getResult()
     */
    public function testGetResultPositive()
    {

    }

    /**
     * TODO: Check that command was executed with exception
     *
     * Mock command`s execute method so that it returns exception and check whether it was thrown
     *
     * @see https://phpunit.readthedocs.io/en/7.1/test-doubles.html
     *
     * @covers Calculator::getResult()
     */
    public function testGetResultNegative()
    {

    }

    /**
     * TODO: Check whether the last item in the intents array was duplicated
     *
     * @covers Calculator::replay()
     */
    public function testReplay()
    {

    }

    /**
     * TODO: Check whether the last item was removed from intents array
     *
     * @covers Calculator::undo()
     */
    public function testUndo()
    {

    }

    /**
     * TODO: what difference between tearDown() and tearDownAfterClass()
     *
     * @see http://phpunit.readthedocs.io/en/7.1/fixtures.html#more-setup-than-teardown
     */
    public function tearDown()
    {
        unset($this->calc);
    }
}
