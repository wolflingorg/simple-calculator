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
     * @throws \InvalidArgumentException
     */
    public function addCommand($name, CommandInterface $command)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid command name. Should be string. %s is given', gettype($name))
            );
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
    public function init($value = 0.0)
    {
        $this->reset();

        $this->value = $value;

        return $this;
    }

    /**
     * Add calculation to process
     *
     * @param $command
     * @param array ...$args
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function compute($command, ...$args)
    {
        // Checking if all arguments are numeric
        if (array_filter($args, 'is_numeric') !== $args) {
            throw new \InvalidArgumentException('All arguments MUST be numeric');
        }

        $this->intents[] = [$this->getCommand($command), $args];

        return $this;
    }

    /**
     * @param $name
     *
     * @return CommandInterface
     * @throws \InvalidArgumentException
     */
    private function getCommand($name)
    {
        if (!$this->hasCommand($name)) {
            throw new \InvalidArgumentException(sprintf('Command %s is not found', $name));
        }

        return $this->commands[$name];
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function hasCommand($name)
    {
        return isset($this->commands[$name]);
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
    public function replay()
    {
        if ($intent = end($this->intents)) {
            $this->intents[] = $intent;
        }

        reset($this->intents);

        return $this;
    }

    /**
     * Calculate result
     *
     * @return float
     * @throws \InvalidArgumentException
     */
    public function getResult()
    {
        $result = $this->value;

        foreach ($this->intents as list($command, $args)) {
            array_unshift($args, $result);

            /** @var CommandInterface $command */
            $result = $command->execute(...$args);
        }

        return $result;
    }
}
