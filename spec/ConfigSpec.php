<?php

namespace spec\Sebastianwestberg\SiteTree;

use Sebastianwestberg\SiteTree\Config;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sebastianwestberg\SiteTree\FormatterInterface;
use spec\PhpSpec\Formatter\BasicFormatterSpec;

class ConfigSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Config::class);
    }

    function it_loads_config_files()
    {
        $this->load(__DIR__.'/fixtures/site-tree.yml')->shouldHaveType(Config::class);
    }
}
