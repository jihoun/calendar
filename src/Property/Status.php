<?php

namespace Jihoun\Calendar\Property;

/**
 * This property defines the overall status or confirmation for the calendar
 * component.
 * @todo make it stronger to follow the documentation
 */
abstract class Status extends IProperty
{
    const NAME = 'STATUS';

    const CANCELLED = 'CANCELLED';      //Indicates journal is removed.
                                        //Indicates event was cancelled.
                                        //Indicates to-do was cancelled.
    protected $value;

    protected function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public static function cancelled(): Status
    {
        return new static(static::CANCELLED);
    }
}
