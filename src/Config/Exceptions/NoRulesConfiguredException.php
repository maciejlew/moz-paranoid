<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Config\Exceptions;

use LionNet\MozPrefs\Discoverer\Config\Exceptions\ConfigurationException;

class NoRulesConfiguredException extends ConfigurationException
{

    /**
     * @return NoRulesConfiguredException
     */
    public static function create(): self
    {
        return new self('Rules not set. See resources/config.yml.dist file.');
    }

}