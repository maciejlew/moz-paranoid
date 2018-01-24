<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Tests\Doubles;

use LionNet\MozParanoid\Config\RulesConfig;

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