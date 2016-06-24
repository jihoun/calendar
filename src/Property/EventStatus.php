<?php
namespace Triedge\Calendar\Property;

class EventStatus extends Status
{
    const TENTATIVE     = 'TENTATIVE';      //Indicates event is tentative.
    const CONFIRMED     = 'CONFIRMED';      //Indicates event is definite.

    public static function tentative()
    {
        return new static(static::TENTATIVE);
    }

    public static function confirmed()
    {
        return new static(static::CONFIRMED);
    }
}
