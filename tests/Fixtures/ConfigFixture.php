<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Fixtures;

use MozParanoid\Config\BasePathConfig;
use MozParanoid\Config\RulesConfig;
use MozParanoid\Tests\Doubles\BasePathConfigMock;
use MozParanoid\Tests\Doubles\RulesConfigMock;

class ConfigFixture
{

    /**
     * @param string $basePath
     * @return BasePathConfig
     */
    public static function createBasePathConfig(string $basePath): BasePathConfig
    {
        $config = new BasePathConfigMock();
        $config->basePath = $basePath;
        return $config;
    }

    /**
     * @param array $rules
     * @return RulesConfig
     */
    public static function createRulesConfig(array $rules): RulesConfig
    {
        $config = new RulesConfigMock();
        $config->rules = $rules;
        return $config;
    }

}