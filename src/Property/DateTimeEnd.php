<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies the date and time that a calendar component ends.
 * @todo  merge logic with dtsart
 */
class DateTimeEnd extends IDateTime
{
    const NAME = 'DTEND';

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
