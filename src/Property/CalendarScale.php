<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the calendar scale used for the calendar information
 * specified in the iCalendar object.
 */
class CalendarScale extends IText
{
    const NAME = 'CALSCALE';

    protected $text_ = 'GREGORIAN';
}
