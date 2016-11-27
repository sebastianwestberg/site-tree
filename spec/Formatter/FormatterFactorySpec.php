<?php

namespace spec\Sebastianwestberg\SiteTree\Formatter;

use PhpSpec\ObjectBehavior;
use Sebastianwestberg\SiteTree\Formatter\FormatterFactory;
use Sebastianwestberg\SiteTree\Formatter\ConsoleFormatter;
use Sebastianwestberg\SiteTree\Formatter\FormatterInterface;

class FormatterFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FormatterFactory::class);
    }

    function it_can_create_a_formatter_instance(ConsoleFormatter $formatter)
    {
        $this->create($formatter, null)
            ->shouldImplement(FormatterInterface::class);
    }
}
