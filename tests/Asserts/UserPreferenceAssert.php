<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Asserts;

use MozParanoid\Domain\UserPreference;
use PHPUnit\Framework\Assert;

class UserPreferenceAssert extends Assert
{

    public function assert(string $expectedName, string $expectedValue, UserPreference $userPreference): void
    {
        $this->assertEquals($expectedName, $userPreference->name);
        $this->assertEquals($expectedValue, $userPreference->value);
    }

}