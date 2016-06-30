<?php
namespace Triedge\Calendar\Property;

/**
 * This value type is used to identify properties that contain a duration of
 * time.
 */
class Duration extends IProperty
{
    const NAME = 'DURATION';

    // protected $positive;
    protected $weeks;
    protected $days;
    protected $hours;
    protected $minutes;
    protected $seconds;

    public function __construct(
        $weeks = 0,
        $days = 0,
        $hours = 0,
        $minutes = 0,
        $seconds = 0
    ) {
        $this->weeks = intval($weeks);
        $this->days = intval($days);
        $this->hours = intval($hours);
        $this->minutes = intval($minutes);
        $this->seconds = intval($seconds);
    }

    public function getValue()
    {
        $res = null;
        if ($this->weeks!==0) {
            $res = $this->weeks.'W';
        } else {
            if ($this->days!=0) {
                $res = $this->days.'D';
            }
            if ($this->seconds!=0) {
                $res = (is_null($res) ? '' : $res);
                $res .= 'T'.$this->hours.'H';
                $res .= $this->minutes.'M';
                $res .= $this->seconds.'S';
            } elseif ($this->minutes!=0) {
                $res = (is_null($res) ? '' : $res);
                $res .= 'T'.$this->hours.'H';
                $res .= $this->minutes.'M';
            } elseif ($this->hours!==0) {
                $res = (is_null($res) ? '' : $res);
                $res .= 'T'.$this->hours.'H';
            }
        }
        return $res;
    }
}
