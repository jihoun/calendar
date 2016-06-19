<?php
namespace Triedge\Calendar\Property;

/**
 * This property is used by an assignee or delegatee of a to-do to convey the percent completion of 
 * a to-do to the "Organizer".
 */
class PercentComplete
{
    public $integer_;

    public function __construct($value)
    {
        $this->integer_ = $this->normalize($value);
    }

    public function toString()
    {
        return 'PERCENT-COMPLETE:'.$this->integer_."\n";
    }

    private function normalize($value)
    {
        $val = 0;
        if (is_numeric($value)) {
            $val = (int)$value;
            if ($val>100) {
                $val = 100;
            } elseif ($val<0) {
                $val = 0;
            }
        }
        return $val;
    }
}