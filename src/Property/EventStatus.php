<?php
namespace Jihoun\Calendar\Property;

class EventStatus extends Status
{
    const TENTATIVE     = 'TENTATIVE';      //Indicates event is tentative.
    const CONFIRMED     = 'CONFIRMED';      //Indicates event is definite.

    public static function tentative(): EventStatus
    {
        return new static(static::TENTATIVE);
    }

    public static function confirmed(): EventStatus
    {
        return new static(static::CONFIRMED);
    }
}
