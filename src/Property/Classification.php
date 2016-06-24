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

    protected $text_;

    public function __construct()
    {
        $this->text_ = static::PUBLIC_;
    }

    public function getValue()
    {
        return $this->text_;
    }

    public static function publicP()
    {
        $res = new static();
        $res->text_ = static::PUBLIC_;
        return $res;
    }
    public static function privateP()
    {
        $res = new static();
        $res->text_ = static::PRIVATE_;
        return $res;
    }
    public static function confidential()
    {
        $res = new static();
        $res->text_ = static::CONFIDENTIAL_;
        return $res;
    }
}
