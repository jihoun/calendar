<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies when the calendar component begins.
 */
class DateTimeStart extends IDateTime
{
    const NAME = 'DTSTART';

    public function getParams()
    {
        return array($this->valueparam, $this->tzidparam);
    }
}
