<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Unit;

use MozParanoid\Infrastructure\UserPreferencesDiscoverer;
use MozParanoid\Tests\Fixtures\FileSystemFixture;
use MozParanoid\Tests\Fixtures\UserPreferencesConfigFixture;
use PHPUnit\Framework\TestCase;

class UserPreferencesDiscovererTest extends TestCase
{

    /** @var UserPreferencesDiscoverer */
    private $discoverer;

    /**
     * @before
     */
    public function init()
    {
        $fileSystemStream = FileSystemFixture::create('test_resources');
        $basePath = $fileSystemStream->url() . DIRECTORY_SEPARATOR . 'profilesPath';
        $config = UserPreferencesConfigFixture::createWithBasePath($basePath);
        $this->discoverer = new UserPreferencesDiscoverer($config);
    }

    /**
     * @test
     */
    public function itShouldFindUserPreferenceFileInPath()
    {
        $userPreferenceFiles = $this->discoverer->discover();

        $this->assertCount(2, $userPreferenceFiles);
        foreach ($userPreferenceFiles as $userPreferenceFile) {
            $this->assertEquals('prefs.js', $userPreferenceFile->getFilename());
        }
    }

}