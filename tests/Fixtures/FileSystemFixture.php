<?php

declare(strict_types=1);

namespace MozParanoid\Tests\Fixtures;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;

class FileSystemFixture
{

    /**
     * @param string $baseDir
     * @return vfsStreamDirectory
     */
    public static function create(string $baseDir): vfsStreamDirectory
    {
        return vfsStream::setup(
            $baseDir,
            null,
            [
                'profilesPath' => [
                    'abcdefg.default' => [
                        'prefs.js' => 'anyContent',
                    ],
                    'qwerty.default' => [
                        'prefs.js' => 'anyContent',
                    ],
                ],
                'anyPath' => [
                    'anyFile' => 'anyContent',
                ],
                'otherPathWithPrefs' => [
                    'prefs.js' => 'anyContent',
                ],
            ]
        );
    }

}