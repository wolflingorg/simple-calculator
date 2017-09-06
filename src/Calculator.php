<?php
namespace src;

use src\Commands\CommandInterface;

class Calculator
{
    /**
     * Initial value
     */
    private $value;

    /**
     * Pull of all available commands
     *
     * @var CommandInterface[] $commands
     */
    private $commands = [];

    /**
     * Calculation history
     */
    private $history = [];

    public function __construct()
    {
        $this->reset();
    }

    /**
     * Adds commands
     *
     * @param $name
     * @param CommandInterface $command
     *
     * @return $this
     */
    public function addCommand($name, CommandInterface $command)
    {
        if (!is_string($name)){
            throw new \InvalidArgumentException(sprintf('Invalid command name. Should be string. %s is given', gettype($name)));
        }

        $this->commands[$name] = $command;

        return $this;
    }

    /**
     * Sets the initial value
     *
     * @param $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->reset();

        $this->value = $value;

        return $this;
    }

    /**
     * Resets the calculator
     */
    function reset()
    {
        $this->history = [];
        $this->value = 0.0;
    }

    /**
     * Calculate result
     *
     * @return float
     */
    public function getResult()
    {
        $result = $this->value;

        foreach ($this->history as list($command, $args)) {
            array_unshift($args, $result);
            $result = $this->commands[$command]->execute(...$args);
        }

        return $result;
    }

    /**
     * Undoes last operation
     *
     * @return $this
     */
    public function undo()
    {
        array_pop($this->history);

        return $this;
    }

    /**
     * Add calculation to process
     *
     * @param $command
     * @param array ...$args
     *
     * @return $this
     */
    public function compute($command, ...$args)
    {
        if (!isset($this->commands[$command])) {
            throw new \InvalidArgumentException(sprintf('Command %s is not found', $command));
        }

        $this->history[] = [$command, $args];

        return $this;
    }
}