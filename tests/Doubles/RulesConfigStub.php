<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Tests\Doubles;

use LionNet\MozParanoid\Config\RulesConfig;

class RulesConfigStub implements RulesConfig
{

    private $rules;

    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    public function getRules(): array
    {
        return $this->rules;
    }
}
