<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the access classification for a calendar component.
 */
class Classification
{
    const PUBLIC_CLASS = 'PUBLIC';
    const PRIVATE_CLASS = 'PRIVATE';
    const CONFIDENTIAL_CLASS = 'CONFIDENTIAL';

    public $value_ = self::PUBLIC_CLASS;

    public function toString()
    {
        return 'CLASS:'.$this->value_."\n";
    }
}