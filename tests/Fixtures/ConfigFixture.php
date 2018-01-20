<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Fixtures;

use MozParanoid\Config\BasePathConfig;
use MozParanoid\Tests\Doubles\BasePathConfigMock;

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

}