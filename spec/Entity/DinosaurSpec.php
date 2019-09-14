<?php

namespace spec\App\Entity;

use App\Entity\Dinosaur;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DinosaurSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Dinosaur::class);
    }
}
