<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies the customary designation for a time zone
 * description.
 */
class TimeZoneName extends IText
{
    const NAME = 'TZNAME';

    protected $languageparam;
    public function getParams()
    {
        return array($this->languageparam);
    }
}
