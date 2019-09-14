<?php

namespace App\Entity;

class Dinosaur
{
    private $length = 0;

    public function __construct($argument1, $argument2)
    {
        // TODO: write logic here
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length)
    {
        $this->length = $length;
    }

    public function getDescription(): string
    {
        return 'The Unknown non-carnivorous dinosaur is 0 meters long';
    }
}
