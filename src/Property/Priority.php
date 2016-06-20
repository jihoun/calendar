<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the relative priority for a calendar component.
 */
class Priority
{
    const NAME = 'PRIORITY';

    const UNDEFINED = 0;
    const HIGH = 1;
    const MEDIUM = 5;
    const LOW = 9;

    protected $integer_;

    public function __construct($value = self::UNDEFINED)
    {
        $this->integer_ = $this->normalize($value);
    }

    public function toString()
    {
        return self::NAME.':'.$this->integer_."\n";
    }

    private function normalize($value)
    {
        $val = self::UNDEFINED;
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
