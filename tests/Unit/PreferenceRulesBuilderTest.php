<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Unit;

use MozParanoid\Exceptions\InvalidRuleFormatException;
use MozParanoid\Infrastructure\PreferenceRulesBuilder;
use MozParanoid\Tests\Asserts\PreferenceRuleAssert;
use MozParanoid\Tests\Fixtures\ConfigFixture;
use PHPUnit\Framework\TestCase;

class PreferenceRulesBuilderTest extends TestCase
{

    /** @var PreferenceRuleAssert */
    private $assert;

    /**
     * @before
     */
    public function init()
    {
        $this->assert = new PreferenceRuleAssert();
    }

    /**
     * @test
     */
    public function itShouldBuildSingleRule()
    {
        $rawRules = [
            'anyRule' => [
                'expectedValue' => 'anyValue',
                'absenceToleration' => true,
            ]
        ];
        $config = ConfigFixture::createRulesConfig($rawRules);
        $rulesBuilder = new PreferenceRulesBuilder($config);

        $rules = $rulesBuilder->build();

        $this->assertCount(1, $rules);
        $this->assert->assert(
            'anyRule',
            'anyValue',
            true,
            $rules[0]
        );
    }

    /**
     * @test
     */
    public function itShouldBuildManyRules()
    {
        $rawRules = [
            'anyRule' => [
                'expectedValue' => 'anyValue',
                'absenceToleration' => true,
            ],
            'anotherRule' => [
                'expectedValue' => 'anotherValue',
                'absenceToleration' => false,
            ],
        ];
        $config = ConfigFixture::createRulesConfig($rawRules);
        $rulesBuilder = new PreferenceRulesBuilder($config);

        $rules = $rulesBuilder->build();

        $this->assertCount(2, $rules);
        $this->assert->assert(
            'anyRule',
            'anyValue',
            true,
            $rules[0]
        );
        $this->assert->assert(
            'anotherRule',
            'anotherValue',
            false,
            $rules[1]
        );
    }

    /**
     * @test
     * @dataProvider invalidRuleFormats
     */
    public function itShouldThrowInvalidRuleFormatException(array $invalidRawRules)
    {
        $config = ConfigFixture::createRulesConfig($invalidRawRules);
        $rulesBuilder = new PreferenceRulesBuilder($config);

        $this->expectException(InvalidRuleFormatException::class);

        $rulesBuilder->build();
    }

    /**
     * @return array
     */
    public function invalidRuleFormats(): array
    {
        return [
            [
                ['invalidRule'] // string
            ],
            [
                ['invalidRule' => []] // empty array
            ],
            [
                ['invalidRule' => ['expectedValue' => 'any']]  // missing absenceToleration
            ],
            [
                ['invalidRule' => ['absenceToleration' => true]] // missing expectedValue
            ],
        ];
    }

}