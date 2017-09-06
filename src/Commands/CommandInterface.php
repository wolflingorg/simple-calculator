<?php
namespace src\Commands;

interface CommandInterface
{
    public function execute(...$args);
}