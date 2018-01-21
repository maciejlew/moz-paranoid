<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Unit;

use MozParanoid\Domain\PreferenceRule;
use MozParanoid\Domain\PreferenceRulesAnalyzer;
use MozParanoid\Domain\UserPreference;
use PHPUnit\Framework\TestCase;

class PreferenceRulesAnalyzerTest extends TestCase
{

    /**
     * @test
     */
    public function itShouldRecognizeRuleAsFulfilledWhenValueMatches()
    {
        $preferences = [new UserPreference('pref1', 'value1'),];
        $rule = new PreferenceRule('pref1', 'value1', true);
        $analyzer = new PreferenceRulesAnalyzer($preferences);

        $result = $analyzer->analyze($rule);

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function itShouldRecognizeRuleAsUnfulfilledWhenValueNotMatches()
    {
        $preferences = [new UserPreference('pref1', 'value1'),];
        $rule = new PreferenceRule('pref1', 'value2', true);
        $analyzer = new PreferenceRulesAnalyzer($preferences);

        $result = $analyzer->analyze($rule);

        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldRecognizeRuleAsUnfulfilledWhenPreferenceIsMissing()
    {
        $preferences = [];
        $rule = new PreferenceRule('pref1', 'value1', false);
        $analyzer = new PreferenceRulesAnalyzer($preferences);

        $result = $analyzer->analyze($rule);

        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function itShouldRecognizeRuleAsFulfilledWhenPreferenceIsMissing()
    {
        $preferences = [];
        $rule = new PreferenceRule('pref1', 'value1', true);
        $analyzer = new PreferenceRulesAnalyzer($preferences);

        $result = $analyzer->analyze($rule);

        $this->assertTrue($result);
    }

}