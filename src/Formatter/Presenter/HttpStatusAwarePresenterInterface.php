<?php


namespace Sebastianwestberg\SiteTree\Formatter\Presenter;


interface HttpStatusAwarePresenterInterface extends PresenterInterface
{
    public function presentStatusCode($code);
}