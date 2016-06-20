<?php
namespace Triedge\Calendar\Property;

abstract class IText
{
    protected $text_;

    public function __construct($text)
    {
        if (is_string($text)) {
            $this->text_ = $text;
        }
    }

    public function toString()
    {
        //TODO sanitize text
        return static::NAME.':'.$this->text_."\n";
    }

    public function getValue()
    {
        return $this->text_;
    }
}
