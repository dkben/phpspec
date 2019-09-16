<?php

namespace App\Service;

use App\Entity\Enclosure;
use App\Entity\Security;
use App\Factory\DinosaurFactory;

class EnclosureBuilderService
{
    public function __construct(DinosaurFactory $dinosaurFactory)
    {
    }

    public function buildEnclosure(
        int $numberOfSecuritySystems = 1,
        int $numberOfDinosaurs = 3
    ): Enclosure
    {
        $enclosure = new Enclosure();

        $this->addSecuritySystems($numberOfSecuritySystems, $enclosure);

        return $enclosure;
    }

    private function addSecuritySystems(int $numberOfSecuritySystems, Enclosure $enclosure)
    {
        $securityNames = ['Fence', 'Electric fence', 'Guard tower'];
        for ($i = 0; $i < $numberOfSecuritySystems; $i++) {
            $securityName = $securityNames[array_rand($securityNames)];
            $security = new Security($securityName, true, $enclosure);
            $enclosure->addSecurity($security);
        }
    }

}
