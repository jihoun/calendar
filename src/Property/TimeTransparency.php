<?php
namespace Triedge\Calendar\Property;

class TimeTransparency
{
    const OPAQUE = 'OPAQUE';
    const TRANSPARENT = 'TRANSPARENT';

    public $value_ = self::OPAQUE;

    public function toString()
    {
        return 'TRANSP:'.$this->value_."\n";
    }
}
