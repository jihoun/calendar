<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the persistent, globally unique identifier for the
 * calendar component.
 */
class Uid extends IText
{
    const NAME = 'UID';

    public function __construct($text = null)
    {
        if (!is_null($text)) {
            parent::__construct($text);
        }
    }
}
