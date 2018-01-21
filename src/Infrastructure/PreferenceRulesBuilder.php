<?php

declare(strict_types=1);

namespace MozParanoid\Infrastructure;

use MozParanoid\Config\RulesConfig;
use MozParanoid\Domain\PreferenceRule;
use MozParanoid\Exceptions\NoRulesConfiguredException;

class PreferenceRulesBuilder
{

    /** @var array */
    private $rawRules;

    /**
     * PreferenceRulesBuilder constructor.
     * @param RulesConfig $config
     * @throws NoRulesConfiguredException
     */
    public function __construct(RulesConfig $config)
    {
        $this->rawRules = $config->getRules();
    }

    /**
     * @return PreferenceRule[]
     */
    public function build(): array
    {
        $rules = [];

        foreach ($this->rawRules as $ruleName => $rawRule) {
            $rules[] = new PreferenceRule(
                $ruleName,
                (string)$rawRule['expectedValue'],
                $rawRule['absenceToleration']
            );
        }

        return $rules;
    }
    
}