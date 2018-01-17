<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Unit;

use MozParanoid\Infrastructure\UserPreferencesParser;
use MozParanoid\Tests\Asserts\UserPreferenceAssert;
use PHPUnit\Framework\TestCase;

class UserPreferencesParserTest extends TestCase
{

    /** @var UserPreferencesParser */
    private $parser;

    /** @var UserPreferenceAssert */
    private $assert;

    /**
     * @before
     */
    public function init()
    {
        $this->parser = new UserPreferencesParser();
        $this->assert = new UserPreferenceAssert();
    }

    /**
     * @test
     */
    public function itShouldFindUserPreference()
    {
        $userPreferences = $this->parser->parse('user_pref("pref", "value")');

        $this->assertCount(1, $userPreferences);
        $this->assert->assert('pref', 'value', $userPreferences[0]);
    }

    /**
     * @test
     */
    public function itShouldFindMultipleUserPreferences()
    {
        $userPreferences = $this->parser->parse('user_pref("pref1", "value1");user_pref("pref2", "value2")');

        $this->assertCount(2, $userPreferences);
        $this->assert->assert('pref1', 'value1', $userPreferences[0]);
        $this->assert->assert('pref2', 'value2', $userPreferences[1]);
    }

    /**
     * @test
     */
    public function itShouldFindBooleanValues()
    {
        $userPreferences = $this->parser->parse('user_pref("pref1", true);user_pref("pref2", false)');

        $this->assertCount(2, $userPreferences);
        $this->assert->assert('pref1', 'true', $userPreferences[0]);
        $this->assert->assert('pref2', 'false', $userPreferences[1]);
    }

}