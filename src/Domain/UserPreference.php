<?php

declare(strict_types=1);

namespace MozParanoid\Domain;

class UserPreference
{

    /** @var string */
    public $name;

    /** @var string */
    public $value;

    /**
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

}