<?php

namespace spec\App\Factory;

use App\Entity\Dinosaur;
use App\Factory\DinosaurFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DinosaurFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DinosaurFactory::class);
    }

    function it_grows_a_large_velociraptor()
    {
        $dinosaur = $this->growVelociraptor(5);

        $dinosaur->shouldBeAnInstanceOf(Dinosaur::class);
        $dinosaur->getGenus()->shouldBeString();
        $dinosaur->getGenus()->shouldBe('Velociraptor');
        $dinosaur->getLength()->shouldBe(5);
    }
}
