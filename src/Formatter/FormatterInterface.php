<?php

namespace Sebastianwestberg\SiteTree\Formatter;

use Sebastianwestberg\SiteTree\Formatter\Presenter\PresenterInterface;

interface FormatterInterface
{
    public function setOptions(array $options);

    public function setPresenter(PresenterInterface $presenter);
}