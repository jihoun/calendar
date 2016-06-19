<?php
namespace Triedge\Calendar\Property;

/**
 * In the case of an iCalendar object that specifies a "METHOD" property, this
 * property specifies the date and time that the instance of the iCalendar
 * object was created.  In the case of an iCalendar object that doesn't specify
 * a "METHOD" property, this property specifies the date and time that the
 * information associated with the calendar component was last revised in the
 * calendar store.
 */
class DateTimeStamp extends IDateTime
{
    const NAME = 'DTSTAMP';
    public function __construct(\DateTime $dt=null)
    {
        $this->dateTime_ = (is_null($dt) ? new \DateTime() : $dt);
    }
}
