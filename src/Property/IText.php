<?php
namespace Triedge\Calendar\Property;

abstract class IText extends IProperty
{
    protected $text;

    public function __construct($text)
    {
        if (is_string($text)) {
            $this->text = $text;
        }
    }

    public function getValue()
    {
        //TODO sanitize text
        return $this->text;
    }
}
