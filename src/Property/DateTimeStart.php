<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies when the calendar component begins.
 */
class DateTimeStart extends IDateTime
{
    const NAME = 'DTSTART';

    protected $fullDay_;

    public function __construct(\DateTime $dt, $fullDay = false)
    {
        parent::__construct($dt);
        $this->fullDay_ = boolval($fullDay);
    }

    public function toString()
    {
        if (!$this->fullDay_) {
            return parent::toString();
        }
        return static::NAME.':'.$this->dateTime_->format('Ymd')."\n";
    }
}
