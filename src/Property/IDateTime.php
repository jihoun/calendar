<?php
namespace Triedge\Calendar\Property;

abstract class IDateTime
{
    protected $dateTime_;

    public function __construct(\DateTime $dt)
    {
        $this->dateTime_ = $dt;
    }

    public function toString()
    {
        return static::NAME.':'.$this->dateTime_->format('Ymd').'T'.$this->dateTime_->format('His')."Z\n";
    }
}
