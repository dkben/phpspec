<?php

namespace spec\App\Entity;

use App\Entity\Dinosaur;
use App\Entity\Enclosure;
use App\Exception\DinosaursAreRunningRampantException;
use App\Exception\NotABuffetException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EnclosureSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Enclosure::class);
    }

    function it_should_have_no_dinosaurs_by_default()
    {
        $this->getDinosaurs()->shouldHaveCount(0);
    }

    function it_should_be_able_to_add_dinosaurs()
    {
        $this->addDinosaur(new Dinosaur());
        $this->addDinosaur(new Dinosaur());

        $this->getDinosaurs()->shouldHaveCount(2);
    }

    function it_should_not_allow_to_add_carnivorous_dinosaurs_to_non_carnivorous_enclosure()
    {
        $this->addDinosaur(new Dinosaur('veggie-eater', false));

        $this
            ->shouldThrow(NotABuffetException::class)
            ->during('addDinosaur', [new Dinosaur('Velociraptor', true)]);
    }

    function it_should_not_allow_to_add_dinosaurs_to_unsecure_enclosures()
    {
        $this
            ->shouldThrow(new DinosaursAreRunningRampantException('Are you craaazy?!?'))
            ->duringAddDinosaur(new Dinosaur('Velociraptor', true));
    }
}
