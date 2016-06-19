<?php
namespace Triedge\Calendar\Property;

/**
* This property provides a more complete description of the calendar component than that provided by 
* the "SUMMARY" property.
*/
class Description
{
    public $value_;

    public function __construct($text)
    {
        if (is_string($text)) {
            $this->value_ = $text;
        }
    }

    public function toString()
    {
        //TODO sanitize text
        return 'DESCRIPTION:'.$this->value_."\n";
    }
}