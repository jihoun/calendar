<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the intended venue for the activity defined by a calendar component.
 */
class Location
{
    const NAME = 'LOCATION';
    public $text;

    public function __construct($text)
    {
        if (is_string($text)) {
            $this->text = $text;
        }
    }

    public function toString()
    {
        //TODO escape text
        return self::NAME.':'.$this->text."\n";
    }
}
