<?php

namespace Sebastianwestberg\SiteTree\Formatter;

use Sebastianwestberg\SiteTree\Formatter\Presenter\ConsolePresenter;
use Sebastianwestberg\SiteTree\Formatter\Presenter\PresenterInterface;

class ConsoleFormatter implements FormatterInterface
{
    private $presenter;

    private $options;

    public function __construct(PresenterInterface $presenter = null, $options = array())
    {
        if (!$presenter) {
            $this->presenter = new ConsolePresenter();
        } else {
            $this->presenter = $presenter;
        }

        $this->options = $options;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    public function setPresenter(PresenterInterface $presenter)
    {
        $this->presenter = $presenter;
    }
}