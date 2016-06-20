<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the date and time that a to-do is expected to be
 * completed.
 * @todo  merge logic with dtstart and dtend
 */
class DateTimeDue extends IDateTime
{
    const NAME = 'DUE';
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
