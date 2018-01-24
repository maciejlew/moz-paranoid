<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Tests\Fixtures;

use LionNet\MozParanoid\Config\RulesConfig;
use LionNet\MozParanoid\Tests\Doubles\RulesConfigMock;

class ConfigFixture
{

    /**
     * @param array $rules
     * @return RulesConfig
     */
    public static function createRulesConfig(array $rules): RulesConfig
    {
        $config = new RulesConfigMock('any');
        $config->rules = $rules;
        return $config;
    }

}