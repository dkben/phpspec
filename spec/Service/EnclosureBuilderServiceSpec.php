<?php

namespace spec\App\Service;

use App\Entity\Enclosure;
use App\Factory\DinosaurFactory;
use App\Service\EnclosureBuilderService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EnclosureBuilderServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(EnclosureBuilderService::class);
    }

    function it_builds_enclosure_with_dinosaurs(DinosaurFactory $dinosaurFactory)
    {
        $this->beConstructedWith($dinosaurFactory);
        $enclosure = $this->buildEnclosure(1, 2);

        $enclosure->shouldBeAnInstanceOf(Enclosure::class);
        $enclosure->isSecurityActive()->shouldReturn(true);
        var_dump($enclosure->getDinosaurs());
    }
}
