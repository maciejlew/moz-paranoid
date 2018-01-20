<?php

declare(strict_types=1);

namespace MozParanoid\Exceptions;

use Exception;

class NoConfigFileException extends Exception
{

    /**
     * @return NoConfigFileException
     */
    public static function create(): self
    {
        return new self('Config file not readable. See resources/config.yml.dist file.');
    }

}