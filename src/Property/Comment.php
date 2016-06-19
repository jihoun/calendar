<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies non-processing information intended to provide a comment to the calendar user.
 * @todo  merge with description
 */
class Comment
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
        return 'COMMENT:'.$this->value_."\n";
    }
}
