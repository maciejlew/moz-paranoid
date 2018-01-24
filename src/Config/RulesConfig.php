<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Config;

use LionNet\MozParanoid\Exceptions\NoRulesConfiguredException;
use LionNet\MozPrefs\Discoverer\Config\Exceptions\NoConfigFileException;
use Symfony\Component\Yaml\Yaml;

class RulesConfig
{

    private $config;

    /**
     * @throws NoConfigFileException
     */
    public function __construct()
    {
        $configFile = __DIR__ . '/../../resources/config.yml';
        if (!is_readable($configFile)) {
            throw NoConfigFileException::create();
        }
        $this->config = Yaml::parse(file_get_contents($configFile));
    }

    /**
     * @return array
     * @throws NoRulesConfiguredException
     */
    public function getRules(): array
    {
        if (!isset($this->config['rules']) || empty($this->config['rules'])) {
            throw NoRulesConfiguredException::create();
        }
        return $this->config['rules'];
    }

}