<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the overall status or confirmation for the calendar
 * component.
 * @todo make it stronger to follow the documentation
 */
abstract class Status extends IProperty
{
    const NAME = 'STATUS';

    const CANCELLED     = 'CANCELLED';      //Indicates journal is removed.
                                            //Indicates event was cancelled.
                                            //Indicates to-do was cancelled.
    protected $value_;

    protected function __construct($value)
    {
        $this->value_ = $value;
    }

    public function getValue()
    {
        return $this->value_;
    }

    public static function cancelled()
    {
        return new static(static::CANCELLED);
    }
}
