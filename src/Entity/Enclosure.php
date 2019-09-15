<?php

namespace App\Entity;

use App\Exception\NotABuffetException;

class Enclosure
{
    /** @var Dinosaur[] */
    private $dinosaurs = [];

    public function getDinosaurs(): array
    {
        return $this->dinosaurs;
    }

    public function addDinosaur(Dinosaur $dinosaur)
    {
        if (!$this->canAddDinosaur($dinosaur)) {
            throw new NotABuffetException();
        }

        $this->dinosaurs[] = $dinosaur;
    }

    private function canAddDinosaur(Dinosaur $dinosaur): bool
    {
        return count($this->dinosaurs) === 0 ||
            ($this->dinosaurs[0]->isCarnivorous() === $dinosaur->isCarnivorous());
    }
}
