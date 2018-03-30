<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Domain;

use LionNet\MozPrefs\Parser\UserPreference;

class PreferenceRulesAnalyzer
{

    /** @var UserPreference[] */
    private $preferences;

    /**
     * @param UserPreference[] $preferences
     */
    public function __construct(array $preferences)
    {
        foreach ($preferences as $preference) {
            $this->preferences[$preference->name] = $preference;
        }
    }

    /**
     * @param PreferenceRule $rule
     * @return bool
     */
    public function analyze(PreferenceRule $rule): bool
    {
        if (isset($this->preferences[$rule->preferenceName])) {
            $result = $this->preferences[$rule->preferenceName]->value == $rule->exceptedValue;
        } else {
            $result = $rule->absenceToleration;
        }

        return $result;
    }
}
