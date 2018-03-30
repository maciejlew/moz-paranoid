<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Tests\Asserts;

use LionNet\MozParanoid\Domain\PreferenceRule;
use PHPUnit\Framework\Assert;

class PreferenceRuleAssert extends Assert
{

    public function assert(string $expectedName, string $expectedValue, bool $expectedAbsenceToleration, PreferenceRule $rule)
    {
        $this->assertEquals($expectedName, $rule->preferenceName);
        $this->assertEquals($expectedValue, $rule->exceptedValue);
        $this->assertEquals($expectedAbsenceToleration, $rule->absenceToleration);
    }
}
