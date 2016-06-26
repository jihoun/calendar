<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines whether or not an event is transparent to busy time
 * searches.
 */
class TimeTransparency extends IProperty
{
    const NAME = 'TRANSP';

    const OPAQUE = 'OPAQUE';
    const TRANSPARENT = 'TRANSPARENT';

    protected $text_ = self::OPAQUE;

    protected function __construct($text)
    {
        $this->text_ = $text;
    }

    public function getValue()
    {
        return $this->text_;
    }

    public static function OPAQUE()
    {
        return new static(static::OPAQUE);
    }

    public static function TRANSPARENT()
    {
        return new static(static::TRANSPARENT);
    }
}
