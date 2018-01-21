<?php

declare(strict_types=1);

namespace MozParanoid\Exceptions;

class NoConfigFileException extends ConfigurationException
{

    /**
     * @return NoConfigFileException
     */
    public static function create(): self
    {
        return new self('Config file not readable. See resources/config.yml.dist file.');
    }

}