<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Doubles;

use MozParanoid\Config\RulesConfig;

class RulesConfigMock extends RulesConfig
{

    /** @var array */
    public $rules;

    /**
     * Intentional overwrite
     */
    public function __construct() {}

    /**
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

}