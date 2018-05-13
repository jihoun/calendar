<?php
namespace Jihoun\Calendar\Property;

/**
 * This property specifies the customary designation for a time zone
 * description.
 */
class TimeZoneName extends IText
{
    const NAME = 'TZNAME';

    protected $languageparam;
    public function getParams(): array
    {
        return [$this->languageparam];
    }
}
