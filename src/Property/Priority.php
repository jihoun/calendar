<?php
namespace Jihoun\Calendar\Property;

/**
 * This property defines the relative priority for a calendar component.
 */
class Priority extends IProperty
{
    const NAME = 'PRIORITY';

    const UNDEFINED = 0;
    const HIGH = 1;
    const MEDIUM = 5;
    const LOW = 9;

    protected $integer;

    public function __construct($value = self::UNDEFINED)
    {
        $this->integer = $this->normalize($value);
    }

    public function getValue()
    {
        return $this->integer;
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
