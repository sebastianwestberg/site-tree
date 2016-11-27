<?php


namespace Sebastianwestberg\SiteTree\Formatter\Presenter;


/**
 * Interface HierarchyAwarePresenterInterface
 * @package Sebastianwestberg\SiteTree\Formatter\Presenter
 *
 *   Example hierarchy (tree):
 *   .
 *   ├── about-us
 *   │   ├── how-it-all-began
 *   │   ├── the-board-of-directors
 *   │   └── the-company
 *   ├── careers
 *   │   └── current-vacancies
 *   │       ├── senior-data-analyst
 *   │       └── software-engineer
 *   │           └── application-form
 *   └── contact-us
 */
interface HierarchyAwarePresenterInterface
{
    public function presentRoot();

    public function presentRootList();

    /**
     * @param $placement
     * @return top|between|bottom
     */
    public function presentRootListItem($text, $placement);

    public function presentChildList();

    /**
     * @param $placement
     * @return top|between|bottom
     */
    public function presentChildListItem($text, $placement);
}