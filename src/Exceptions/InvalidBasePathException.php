<?php

declare(strict_types=1);

namespace MozParanoid\Exceptions;

use Exception;

class InvalidBasePathException extends Exception
{

    /**
     * @return InvalidBasePathException
     */
    public static function create(): self
    {
        return new self('Invalid base path. See resources/config.yml file.');
    }

}