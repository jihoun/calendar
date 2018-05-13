<?php

namespace Jihoun\Calendar\Property;

abstract class IText extends IProperty
{
    protected $text;

    public function __construct(string $text = '')
    {
        $this->text = $text;
    }

    public function getValue(): ?string
    {
        $text = $this->text;
        $text = str_replace("\n", '\n', $text);

        return $text;
    }
}
