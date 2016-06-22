<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the overall status or confirmation for the calendar
 * component.
 * @todo make it stronger to follow the documentation
 */
class Status extends IProperty
{
    const NAME = 'STATUS';

    const TENTATIVE     = 'TENTATIVE';      //Indicates event is tentative.
    const CONFIRMED     = 'CONFIRMED';      //Indicates event is definite.

    const NEEDS_ACTION  = 'NEEDS-ACTION';   //Indicates to-do needs action.
    const COMPLETED     = 'COMPLETED';      //Indicates to-do completed.
    const IN_PROCESS    = 'IN-PROCESS';     //Indicates to-do in process of.

    const DRAFT         = 'DRAFT';          //Indicates journal is draft.
    const FINAL_        = 'FINAL';          //Indicates journal is final.

    const CANCELLED     = 'CANCELLED';      //Indicates journal is removed.
                                            //Indicates event was cancelled.
                                            //Indicates to-do was cancelled.
    protected $value_;

    private function __construct($value)
    {
        $this->value_ = $value;
    }

    public function getValue()
    {
        return $this->value_;
    }

    public static function TENTATIVE()
    {
        return new static(static::TENTATIVE);
    }

    public static function CONFIRMED()
    {
        return new static(static::CONFIRMED);
    }

    public static function NEEDS_ACTION()
    {
        return new static(static::NEEDS_ACTION);
    }
    public static function COMPLETED()
    {
        return new static(static::COMPLETED);
    }
    public static function IN_PROCESS()
    {
        return new static(static::IN_PROCESS);
    }

    public static function DRAFT()
    {
        return new static(static::DRAFT);
    }
    public static function FINAL_()
    {
        return new static(static::FINAL_);
    }

    public static function CANCELLED()
    {
        return new static(static::CANCELLED);
    }
}
