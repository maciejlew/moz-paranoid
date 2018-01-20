<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Doubles;

use MozParanoid\Config\UserPreferencesConfig;

class UserPreferencesBasePathConfigMock extends UserPreferencesConfig
{

    /** @var string */
    public $basePath;

    /**
     * Intentional overwrite
     */
    public function __construct() {}

    /**
     * @return string
     */
    public function getBasePath(): string
    {
        return $this->basePath;
    }

}