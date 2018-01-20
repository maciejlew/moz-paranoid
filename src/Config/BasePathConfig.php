<?php

declare(strict_types=1);

namespace MozParanoid\Config;

use MozParanoid\Exceptions\NoBasePathConfiguredException;
use MozParanoid\Exceptions\NoConfigFileException;
use Symfony\Component\Yaml\Yaml;

class BasePathConfig
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
        $this->config = Yaml::parse($configFile);
    }

    /**
     * @return string
     * @throws NoBasePathConfiguredException
     */
    public function getBasePath(): string
    {
        if (!isset($this->config['basePath']) || empty($this->config['basePath'])) {
            throw NoBasePathConfiguredException::create();
        }
        return $this->config['basePath'];
    }

}