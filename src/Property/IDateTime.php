<?php

namespace Jihoun\Calendar\Property;

use Jihoun\Calendar\Parameter\ValueDataTypes;

abstract class IDateTime extends IProperty
{
    /** boolean */
    protected $fullDay;
    /** @var \DateTimeInterface */
    protected $dateTime;

    protected $valueparam = null;
    protected $tzidparam = null;

    public function __construct(\DateTimeInterface $dt, bool $fullDay = false)
    {
        $this->dateTime = $dt;
        $this->fullDay = $fullDay;
        $this->valueparam = $this->fullDay ? ValueDataTypes::date() : ValueDataTypes::dateTime();
    }

    public function getValue(): ?string
    {
        if ($this->fullDay) {
            return $this->dateTime->format('Ymd');
        }

        return $this->dateTime->format('Ymd\THis\Z');
    }
}
