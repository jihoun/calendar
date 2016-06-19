<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies the identifier corresponding to the highest version
 * number or the minimum and maximum range of the iCalendar specification that
 * is required in order to interpret the iCalendar object.
 */
class Version extends IText
{
    const NAME = 'VERSION';
    protected $text_ = '2.0';

    public function __construct()
    {
    }
}
