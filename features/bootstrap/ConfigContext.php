<?php

use Sebastianwestberg\Fizzbuzz\Fizzbuzz;
use Behat\Gherkin\Node\TableNode;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Behat\Tester\Exception\PendingException;
use \Sebastianwestberg\SiteTree\Config;

require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';

class ConfigContext implements \Behat\Behat\Context\SnippetAcceptingContext
{
    private $config;

    private $filename;

    public function __construct()
    {
        $this->config = new Config();
    }

    /**
     * @Given a config file named :filename exists
     */
    public function aConfigFileNamedExists($filename)
    {
        $filename = __DIR__.'/../'.$filename;
        if (!file_exists($filename)) {
            if (file_put_contents($filename, '') === false) {
                throw new Exception('Could not create file "'.$filename.'"');
            }
        }

        $this->filename = $filename;
    }

    /**
     * @Given the config file contains:
     */
    public function theConfigFileContains(PyStringNode $string)
    {
        if (file_put_contents($this->filename, $string) === false) {
            throw new Exception(sprintf('Could not add %s to %s', $string, $this->filename));
        }
    }

    /**
     * @Given I load the config file
     */
    public function iLoadTheConfigFile()
    {
        $yml = $this->config->load($this->filename);
    }

    /**
     * @Then I should get :format as a configured format
     */
    public function iShouldGetAsAConfiguredFormat($format)
    {
        throw new PendingException();
    }
}