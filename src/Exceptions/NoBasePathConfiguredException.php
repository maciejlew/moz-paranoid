<?php

declare(strict_types=1);

namespace MozParanoid\Exceptions;

use Exception;

class NoBasePathConfiguredException extends Exception
{

    /**
     * @return NoBasePathConfiguredException
     */
    public static function create(): self
    {
        return new self('Base path not set. See resources/config.yml.dist file.');
    }

}