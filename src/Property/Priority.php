<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the relative priority for a calendar component.
 */
class Priority
{
    public $integer_;

    public function __construct($value = 0)
    {
        $this->integer_ = $this->normalize($value);
    }

    public function toString()
    {
        return 'PRIORITY:'.$this->integer_."\n";
    }

    private function normalize($value)
    {
        $val = 0;
        if (is_numeric($value)) {
            $val = (int)$value;
            if ($val>9) {
                $val = 9;
            } elseif ($val<0) {
                $val = 0;
            }
        }
        return $val;
    }
}