<?php
namespace Jihoun\Calendar\Property;

/**
 * This property specifies when the calendar component begins.
 */
class DateTimeStart extends IDateTime
{
    const NAME = 'DTSTART';

    public function getParams(): array
    {
        return [$this->valueparam, $this->tzidparam];
    }
}
