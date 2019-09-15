<?php

namespace App\Entity;

use App\Exception\DinosaursAreRunningRampantException;
use App\Exception\NotABuffetException;

class Enclosure
{
    /** @var Dinosaur[] */
    private $dinosaurs = [];

    /** @var Security[] */
    private $securities = [];

    public function __construct(bool $withBasicSecurity = false, array $initialDinosaurs = [])
    {
        if ($withBasicSecurity) {
            $this->addSecurity(new Security('Fancy', true, $this));
        }

        foreach ($initialDinosaurs as $dinosaur) {
            $this->addDinosaur($dinosaur);
        }
    }

    public function getDinosaurs(): array
    {
        return $this->dinosaurs;
    }

    public function addDinosaur(Dinosaur $dinosaur)
    {
        if (!$this->isSecurityActive()) {
            throw new DinosaursAreRunningRampantException('Are you craaazy?!?');
        }

        if (!$this->canAddDinosaur($dinosaur)) {
            throw new NotABuffetException();
        }

        $this->dinosaurs[] = $dinosaur;
    }

    public function addSecurity(Security $security)
    {
        $this->securities[] = $security;
    }

    private function canAddDinosaur(Dinosaur $dinosaur): bool
    {
        return count($this->dinosaurs) === 0 || $dinosaur->hasSameDietAs($this->dinosaurs[0]);
    }

    private function isSecurityActive(): bool
    {
        foreach ($this->securities as $security) {
            if ($security->getIsActive()) {
                return true;
            }
        }

        return false;
    }
}
