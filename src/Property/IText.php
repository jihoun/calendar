<?php
namespace Triedge\Calendar\Property;

abstract class IText extends IProperty
{
    protected $text_;

    public function __construct($text)
    {
        if (is_string($text)) {
            $this->text_ = $text;
        }
    }

    public function getValue()
    {
        //TODO sanitize text
        return $this->text_;
    }
}
