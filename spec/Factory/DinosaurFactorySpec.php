<?php

namespace spec\App\Factory;

use App\Entity\Dinosaur;
use App\Factory\DinosaurFactory;
use PhpSpec\Exception\Example\SkippingException;
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

    function it_grows_a_triceratops()
    {

    }

    function it_grows_a_small_velociraptor()
    {
        if (!class_exists('Nanny')) {
            throw new SkippingException('Someone needs to look over dino puppies');
        }

        $this->growVelociraptor(1)->shouldBeAnInstanceOf(Dinosaur::class);
    }
}
