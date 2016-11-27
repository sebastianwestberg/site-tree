<?php

namespace spec\Sebastianwestberg\SiteTree\Formatter;

use PhpSpec\ObjectBehavior;
use Sebastianwestberg\SiteTree\FormatterInterface;
use Sebastianwestberg\SiteTree\Formatter\ConsoleFormatter;

class ConsoleFormatterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ConsoleFormatter::class);
    }
}
