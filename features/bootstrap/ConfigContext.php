<?php

use Behat\Gherkin\Node\TableNode;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Behat\Tester\Exception\PendingException;
use \Sebastianwestberg\SiteTree\Config;

require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';

class ConfigContext implements \Behat\Behat\Context\SnippetAcceptingContext
{
    protected $config;

    protected $filename;

    protected $formatters;

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
        $config = $this->config->load($this->filename);
        $this->formatters = $config->getFormatters();
    }

    /**
     * @Then I should get :arg1 as a configured formatter
     */
    public function iShouldGetAsAConfiguredFormatter($formatter)
    {
        $formatterIsLoaded = false;

        foreach ($this->formatters as $configuredFormatter) {
            if ($configuredFormatter instanceof $formatter) {
                $formatterIsLoaded = true;
            }
        }

        assertTrue($formatterIsLoaded);
    }
}