<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines whether or not an event is transparent to busy time
 * searches.
 */
class TimeTransparency extends IText
{
    const NAME = 'TRANSP';

    const OPAQUE = 'OPAQUE';
    const TRANSPARENT = 'TRANSPARENT';

    protected $text_ = self::OPAQUE;

    public function __construct($text = null)
    {
        if (!is_null($text)) {
            parent::__construct($text);
        }
    }
}
