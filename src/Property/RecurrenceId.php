<?php
namespace Triedge\Calendar\Property;

/**
 * This property is used in conjunction with the "UID" and "SEQUENCE" properties
 * to identify a specific instance of a recurring "VEVENT", "VTODO", or
 * "VJOURNAL" calendar component.
 * The property value is the original value of the "DTSTART" property of the
 * recurrence instance.
 */
class RecurrenceId
{
    const NAME = 'RECURRENCE-ID';
    //TODO
    public function toString()
    {
        //TODO
        return '';
    }
}
