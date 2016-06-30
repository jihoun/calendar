<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the access classification for a calendar component.
 */
class Classification extends IProperty
{
    const NAME = 'CLASS';

    const PUBLIC_ = 'PUBLIC';
    const PRIVATE_ = 'PRIVATE';
    const CONFIDENTIAL_ = 'CONFIDENTIAL';

    protected $text;

    public function __construct()
    {
        $this->text = static::PUBLIC_;
    }

    public function getValue()
    {
        return $this->text;
    }

    public static function publicP()
    {
        $res = new static();
        $res->text = static::PUBLIC_;
        return $res;
    }
    public static function privateP()
    {
        $res = new static();
        $res->text = static::PRIVATE_;
        return $res;
    }
    public static function confidential()
    {
        $res = new static();
        $res->text = static::CONFIDENTIAL_;
        return $res;
    }
}
