<?php
namespace Jihoun\Calendar\Property;

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

    protected function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getValue(): ?string
    {
        return $this->text;
    }

    public static function opaque(): TimeTransparency
    {
        return new static(static::OPAQUE);
    }

    public static function transparent(): TimeTransparency
    {
        return new static(static::TRANSPARENT);
    }
}
