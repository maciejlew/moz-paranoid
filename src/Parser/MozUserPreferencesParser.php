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

        if (preg_match_all('/user_pref\("([^"]+)",[ ]?"([^"]*)"\)/', $input, $matches, PREG_SET_ORDER)) {
            $userPreferences = array_map([$this, 'createUserPreference'], $matches);
        }

        return $userPreferences;
    }

    private function createUserPreference(array $match): UserPreference
    {
        return new UserPreference($match[1], $match[2]);
    }

}