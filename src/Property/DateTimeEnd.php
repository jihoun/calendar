<?php
namespace Jihoun\Calendar\Property;

/**
 * This property specifies the date and time that a calendar component ends.
 * @todo  merge logic with dtsart
 */
class DateTimeEnd extends IDateTime
{
    const NAME = 'DTEND';

    public function getParams(): array
    {
        return [$this->valueparam, $this->tzidparam];
    }
}
