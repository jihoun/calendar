<?php
namespace Triedge\Calendar\Property;

class TimeTransparency
{
    const NAME = 'TRANSP';

    const OPAQUE = 'OPAQUE';
    const TRANSPARENT = 'TRANSPARENT';

    public $value_ = self::OPAQUE;

    public function toString()
    {
        return self::NAME.':'.$this->value_."\n";
    }
}
