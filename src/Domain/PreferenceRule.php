<?php

declare(strict_types=1);

namespace LionNet\MozParanoid\Domain;

class PreferenceRule
{

    /** @var string */
    public $preferenceName;

    /** @var string */
    public $exceptedValue;

    /** @var bool */
    public $absenceToleration;

    /**
     * @param string $preferenceName
     * @param string $exceptedValue
     * @param bool $absenceToleration
     */
    public function __construct(string $preferenceName, string $exceptedValue, bool $absenceToleration)
    {
        $this->preferenceName = $preferenceName;
        $this->exceptedValue = $exceptedValue;
        $this->absenceToleration = $absenceToleration;
    }

}