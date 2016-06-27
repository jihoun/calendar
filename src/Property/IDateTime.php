<?php
namespace Triedge\Calendar\Property;

abstract class IDateTime extends IProperty
{
    protected $fullDay_;
    protected $dateTime_;

    protected $valueparam_ = null;
    protected $tzidparam_ = null;

    public function __construct(\DateTime $dt, $fullDay = false)
    {
        $this->dateTime_ = $dt;
        $this->fullDay_ = boolval($fullDay);
        if ($this->fullDay_) {
            $this->valueparam_ = \Triedge\Calendar\Parameter\ValueDataTypes::date();
        } else {
            $this->valueparam_ = \Triedge\Calendar\Parameter\ValueDataTypes::dateTime();
        }
    }

    public function getValue()
    {
        if ($this->fullDay_) {
            return $this->dateTime_->format('Ymd');
        } else {
            return $this->dateTime_->format('Ymd\THis\Z');
        }
    }
}
