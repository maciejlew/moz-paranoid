<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Doubles;

use MozParanoid\Config\BasePathConfig;

class BasePathConfigMock extends BasePathConfig
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