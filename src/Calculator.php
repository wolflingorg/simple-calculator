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
     * All available commands
     *
     * @var CommandInterface[] $commands
     */
    private $commands = [];

    /**
     * Calculation intents
     */
    private $intents = [];

    /**
     * Calculator constructor.
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Resets the calculator
     */
    private function reset()
    {
        $this->intents = [];
        $this->value = 0.0;
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
        if (!is_string($name)) {
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
    public function init($value)
    {
        $this->reset();

        $this->value = $value;

        return $this;
    }

    /**
     * Calculate result
     *
     * @return float
     */
    public function getResult()
    {
        $result = $this->value;

        foreach ($this->intents as list($command, $args)) {
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
        array_pop($this->intents);

        return $this;
    }

    /**
     * Repeat last operation
     *
     * @return $this
     */
    public function redo()
    {
        if ($operation = end($this->intents)) {
            $this->intents[] = $operation;
        }

        reset($this->intents);

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
        // Checking if command is valid
        if (!isset($this->commands[$command])) {
            throw new \InvalidArgumentException(sprintf('Command %s is not found', $command));
        }

        // Checking if all arguments are numeric
        if (array_filter($args, 'is_numeric') !== $args) {
            throw new \InvalidArgumentException('All arguments MUST be numeric');
        }

        $this->intents[] = [$command, $args];

        return $this;
    }
}
