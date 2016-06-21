<?php
namespace Triedge\Calendar\Property;

/**
 * This value type is used to identify properties that contain a duration of
 * time.
 */
class Duration
{
    const NAME = 'DURATION';

    protected $positive_;
    protected $weeks_;
    protected $days_;
    protected $hours_;
    protected $minutes_;
    protected $seconds_;

    public function __construct(
        $weeks = 0,
        $days = 0,
        $hours = 1,
        $minutes = 0,
        $seconds = 0
    ) {
        $this->weeks_ = intval($weeks);
        $this->days_ = intval($days);
        $this->hours_ = intval($hours);
        $this->minutes_ = intval($minutes);
        $this->seconds_ = intval($seconds);
    }

    public function toString()
    {
        $res = self::NAME.':P';
        if ($this->weeks_!==0) {
            $res .= $this->weeks_.'W';
        } else {
            if ($this->days_!=0) {
                $res .= $this->days_.'D';
            }
            if ($this->seconds_!=0) {
                $res .= 'T'.$this->hours_.'H';
                $res .= $this->minutes_.'M';
                $res .= $this->seconds_.'S';
            } elseif ($this->minutes_!=0) {
                $res .= 'T'.$this->hours_.'H';
                $res .= $this->minutes_.'M';
            } elseif ($this->hours_!==0) {
                $res .= 'T'.$this->hours_.'H';
            }
        }
        $res .= "\n";
        return $res;
    }
}
