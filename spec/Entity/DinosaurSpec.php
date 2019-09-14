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

    function it_should_default_to_zero_length()
    {
        $this->getLength()->shouldReturn(0);
    }

    function it_should_allow_to_set_length()
    {
        $this->setLength(9);

        $this->getLength()->shouldReturn(9);
    }
}
