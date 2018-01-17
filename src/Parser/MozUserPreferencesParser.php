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

        $matches = [];
        if (preg_match('/user_pref\("([^"]+)",[ ]?"([^"]*)"\)/', $input, $matches)) {
            $userPreferences[] = $this->createUserPreference($matches);
        }

        return $userPreferences;
    }

    private function createUserPreference(array $matches): UserPreference
    {
        return new UserPreference($matches[1], $matches[2]);
    }


}