<?php
namespace Jihoun\Calendar\Property;

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
        $text = $this->text;
        $text = str_replace("\n", '\n', $text);
        return $text;
    }
}
