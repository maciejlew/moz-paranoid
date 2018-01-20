<?php

declare(strict_types=1);

namespace MozParanoid\Infrastructure;

use MozParanoid\Config\UserPreferencesConfig;
use MozParanoid\Exceptions\NoBasePathConfiguredException;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class UserPreferencesDiscoverer
{

    /** @var string */
    private $basePath;

    /**
     * @param UserPreferencesConfig $config
     * @throws NoBasePathConfiguredException
     */
    public function __construct(UserPreferencesConfig $config)
    {
        $this->basePath = $config->getBasePath();
    }

    /**
     * @return SplFileInfo[]
     */
    public function discover(): array
    {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->basePath));
        $iterator = new UserPreferencesFileIterator($iterator);
        return iterator_to_array($iterator);
    }

}