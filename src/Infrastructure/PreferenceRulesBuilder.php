<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Infrastructure;

use LionNet\MozParanoid\Config\RulesConfig;
use LionNet\MozParanoid\Domain\PreferenceRule;
use LionNet\MozParanoid\Exceptions\InvalidRuleFormatException;
use LionNet\MozParanoid\Exceptions\NoRulesConfiguredException;

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
     * @throws InvalidRuleFormatException
     */
    public function build(): array
    {
        $rules = [];

        foreach ($this->rawRules as $ruleName => $rawRule) {

            $this->checkRuleFormat($rawRule);

            $rules[] = new PreferenceRule(
                $ruleName,
                (string)$rawRule['expectedValue'],
                $rawRule['absenceToleration']
            );
        }

        return $rules;
    }

    /**
     * @param $rawRule
     * @throws InvalidRuleFormatException
     */
    private function checkRuleFormat($rawRule): void
    {
        if (!is_array($rawRule)) {
            throw InvalidRuleFormatException::create();
        }

        if (!array_key_exists('expectedValue', $rawRule)) {
            throw InvalidRuleFormatException::create();
        }

        if (!array_key_exists('absenceToleration', $rawRule)) {
            throw InvalidRuleFormatException::create();
        }
    }

}