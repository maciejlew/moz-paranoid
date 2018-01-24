<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Config\Exceptions;

use LionNet\MozPrefs\Discoverer\Config\Exceptions\ConfigurationException;

class InvalidRuleFormatException extends ConfigurationException
{

    /**
     * @return InvalidRuleFormatException
     */
    public static function create(): self
    {
        return new self('Invalid rule format. See resources/config.yml file.');
    }

}