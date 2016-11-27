<?php

namespace Sebastianwestberg\SiteTree\Formatter\Presenter;

interface PresenterInterface extends HierarchyAwarePresenterInterface
{
    public function presentUrl($url);
}