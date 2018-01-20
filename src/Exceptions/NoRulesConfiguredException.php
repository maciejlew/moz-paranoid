<?php

declare(strict_types=1);

namespace MozParanoid\Exceptions;

use Exception;

class NoRulesConfiguredException extends Exception
{

    /**
     * @return NoRulesConfiguredException
     */
    public static function create(): self
    {
        return new self('Rules not set. See resources/config.yml.dist file.');
    }

}