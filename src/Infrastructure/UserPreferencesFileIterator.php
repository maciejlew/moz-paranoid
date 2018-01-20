<?php

declare(strict_types=1);

namespace MozParanoid\Infrastructure;

use FilterIterator;
use SplFileInfo;

class UserPreferencesFileIterator extends FilterIterator
{

    private const USER_PREFERENCES_FILE_NAME = 'prefs.js';

    /**
     * @return bool
     */
    public function accept()
    {
        $file = $this->getCurrentFile();
        return $file->isFile() && $file->getFilename() == self::USER_PREFERENCES_FILE_NAME;
    }

    /**
     * @return SplFileInfo
     */
    private function getCurrentFile(): SplFileInfo
    {
        return $this->getInnerIterator()->current();
    }

}