<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the access classification for a calendar component.
 */
class Classification extends IText
{
    const NAME = 'CLASS';

    const PUBLIC_CLASS = 'PUBLIC';
    const PRIVATE_CLASS = 'PRIVATE';
    const CONFIDENTIAL_CLASS = 'CONFIDENTIAL';

    protected $text_ = self::PUBLIC_CLASS;

    public function __construct($text = null)
    {
        if (!is_null($text)) {
            parent::__construct($text);
        }
    }
}
