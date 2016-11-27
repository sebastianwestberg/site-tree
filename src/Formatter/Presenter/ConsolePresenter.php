<?php

namespace Sebastianwestberg\SiteTree\Formatter\Presenter;

class ConsolePresenter implements PresenterInterface
{
    const CHILD_ITEM_TOP_BETWEEN = '├── %s\n';
    const CHILD_ITEM_BOTTOM = '└── %s\n';

    public function presentRoot() {
        return '.\n';
    }

    public function presentRootList() {
        return '';
    }

    public function presentRootListItem($text, $placement) {
        if ($placement !== 'bottom') {
            return sprintf(self::CHILD_ITEM_TOP_BETWEEN, $text);
        }

        return sprintf(self::CHILD_ITEM_BOTTOM, $text);
    }

    public function presentChildList() {
        return '';
    }

    public function presentChildListItem($text, $placement) {
        if ($placement !== 'bottom') {
            return sprintf(self::CHILD_ITEM_TOP_BETWEEN, $text);
        }

        return sprintf(self::CHILD_ITEM_BOTTOM, $text);
    }

    public function presentUrl($url) {
        return $url;
    }
}