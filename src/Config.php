<?php

namespace Sebastianwestberg\SiteTree;

use Sebastianwestberg\SiteTree\Formatter\FormatterFactory;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class Config
{
    private $formatters;

    /**
     * @var \Symfony\Component\Yaml\Yaml
     */
    private $parser;

    public function __construct()
    {
        $this->parser = Yaml::class;
        $this->formatters = array();
    }

    private function getDefaultConfig()
    {
        $config = file_get_contents('site-tree.yml');
        $defaultConfig = $this->parseConfig($config);

        return $defaultConfig;
    }

    /**
     * @param $filename
     * @return $this
     * @throws \Exception
     */
    public function load($filename)
    {
        $config = file_get_contents($filename);

        if ($config === false) {
            throw new \Exception(sprintf('Configuration file "%s" could not be found.'));
        }

        $config = $this->parseConfig($config);
        if (isset($config['formatters'])) {
            $this->createFormatters($config['formatters']);
        }

        return $this;
    }

    public function getFormatters()
    {
        return $this->formatters;
    }

    /**
     * @param $formatters
     * @throws \Exception
     */
    private function createFormatters($formatters) {
        foreach ($formatters as $formatter => $options) {
            if (class_exists('Sebastianwestberg\SiteTree\Formatter\\' . $formatter)) {
                $formatter = 'Sebastianwestberg\SiteTree\Formatter\\' . $formatter;
            } elseif (!class_exists($formatter)) {
                throw new \Exception(sprintf('Formatter "%s" doesn\'t exist.', $formatter));
            }

            $this->formatters[] = FormatterFactory::create($formatter, $options);
        }
    }

    /**
     * @param $config
     * @return mixed
     */
    private function parseConfig($config) {
        try {
            $config = $this->parser::parse($config);
        } catch (ParseException $e) {
            throw new ParseException("Unable to parse the YAML string: %s", $e->getMessage());
        }

        return $config;
    }

}