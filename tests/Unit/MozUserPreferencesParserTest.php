<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Unit;

use MozParanoid\Parser\MozUserPreferencesParser;
use PHPUnit\Framework\TestCase;

class MozUserPreferencesParserTest extends TestCase
{

    /** @var MozUserPreferencesParser */
    private $parser;

    /**
     * @before
     */
    public function init()
    {
        $this->parser = new MozUserPreferencesParser();
    }

    /**
     * @test
     */
    public function itShouldFindUserPreference()
    {
        $userPreferences = $this->parser->parse('user_pref("pref", "value")');

        $this->assertCount(1, $userPreferences);
        $this->assertEquals('pref', $userPreferences[0]->name);
        $this->assertEquals('value', $userPreferences[0]->value);
    }

}