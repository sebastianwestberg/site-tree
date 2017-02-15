<?php

use Behat\Gherkin\Node\TableNode;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Behat\Tester\Exception\PendingException;
use \Sebastianwestberg\SiteTree\Config;

require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';

class FormatterContext extends ConfigContext implements \Behat\Behat\Context\SnippetAcceptingContext
{
    protected $payload;

    /**
     * @Given the following site-tree:
     */
    public function theFollowingSiteTree(PyStringNode $payload)
    {
        $this->payload = json_decode($payload, true);
    }

    /**
     * @Then the formatter :formatter should return:
     */
    public function theFormatterShouldReturn($formatter, PyStringNode $string)
    {
        $presenter = "\n";

        $test = array(
            'foo',
            'bar' => array(
                'child1',
                'child2' => array(
                    'child3'
                )
            )
        );

        $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($test), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($iterator as $key => $value) {
//            var_dump("depth: ".$iterator->getDepth());
//            var_dump("key: ". $key);
//            var_dump("hasChildren: ". $iterator->callHasChildren());
//            var_dump($value);

            if ($iterator->callHasChildren()) {
                // parent with a child
                $presenter .= "\t -> ".$key."\n";
            } elseif ($iterator->getDepth() > 0) {
                // child
                $presenter .= "\t"*2 ." - ". $value."\n";
            } else {
                // neither parent or child
                $presenter .= "\t * ". $value."\n";
            }
        }

        var_dump($presenter);
    }
}