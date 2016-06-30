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

    protected $text = self::OPAQUE;

    protected function __construct($text)
    {
        $this->text = $text;
    }

    public function getValue()
    {
        return $this->text;
    }

    public static function opaque()
    {
        return new static(static::OPAQUE);
    }

    public static function transparent()
    {
        return new static(static::TRANSPARENT);
    }
}
