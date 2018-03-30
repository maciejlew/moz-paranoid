<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Tests\Fixtures;

use LionNet\MozParanoid\Tests\Doubles\RulesConfigStub;

class ConfigFixture
{

    /**
     * @param array $rules
     * @return RulesConfigStub
     */
    public static function createRulesConfig(array $rules): RulesConfigStub
    {
        return new RulesConfigStub($rules);
    }
}
