<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Config;

use LionNet\MozParanoid\Config\Exceptions\NoRulesConfiguredException;
use LionNet\MozPrefs\Discoverer\Config\Exceptions\NoConfigFileException;
use Symfony\Component\Yaml\Yaml;

class RulesConfig
{

    private $config;

    /**
     * @throws NoConfigFileException
     */
    public function __construct(string $configFilePath)
    {
        if (!is_readable($configFilePath)) {
            throw NoConfigFileException::create();
        }
        $this->config = Yaml::parse(file_get_contents($configFilePath));
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