<?php
namespace Triedge\Calendar\Property;

abstract class IDateTime extends IProperty
{
    protected $dateTime_;

    public function __construct(\DateTime $dt)
    {
        $this->dateTime_ = $dt;
    }

    public function getValue()
    {
        return $this->dateTime_->format('Ymd\THis\Z');
    }
}
