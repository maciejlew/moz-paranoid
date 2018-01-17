<?php

declare(strict_types=1);

namespace MozParanoid\Parser;

use MozParanoid\Domain\UserPreference;

class MozUserPreferencesParser
{

    /**
     * @param string $input
     * @return UserPreference[]
     */
    public function parse(string $input): array
    {
        $userPreferences = [];

        $patterns = [
            '/user_pref\("([^"]+)",[ ]?"([^"]*)"\)/',
            '/user_pref\("([^"]+)",[ ]?(true|false)\)/'
        ];

        foreach ($patterns as $pattern) {
            if (preg_match_all($pattern, $input, $matches, PREG_SET_ORDER)) {
                $patternPreferences = array_map([$this, 'createUserPreference'], $matches);
                $userPreferences = array_merge($userPreferences, $patternPreferences);
            }
        }

        return $userPreferences;
    }

    private function createUserPreference(array $match): UserPreference
    {
        return new UserPreference($match[1], $match[2]);
    }

}