<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Fixtures;

use MozParanoid\Config\UserPreferencesConfig;
use MozParanoid\Tests\Doubles\UserPreferencesBasePathConfigMock;

class UserPreferencesConfigFixture
{

    /**
     * @param string $basePath
     * @return UserPreferencesConfig
     */
    public static function createWithBasePath(string $basePath): UserPreferencesConfig
    {
        $config = new UserPreferencesBasePathConfigMock();
        $config->basePath = $basePath;
        return $config;
    }

}