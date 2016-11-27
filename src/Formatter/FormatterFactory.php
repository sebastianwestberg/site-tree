<?php

namespace Sebastianwestberg\SiteTree\Formatter;

class FormatterFactory
{
    public static function create($formatter, $options)
    {
        return new $formatter(null, $options);
    }
}