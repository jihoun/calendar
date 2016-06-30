<?php
namespace Triedge\Calendar\Property;

/**
 * This property is used by an assignee or delegatee of a to-do to convey the
 * percent completion of a to-do to the "Organizer".
 * @todo  merge with Priority
 */
class PercentComplete extends IProperty
{
    const NAME = 'PERCENT-COMPLETE';
    public $integer;

    public function __construct($value)
    {
        $this->integer = $this->normalize($value);
    }

    public function getValue()
    {
        return $this->integer;
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
