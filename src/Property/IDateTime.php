<?php
namespace Jihoun\Calendar\Property;

abstract class IDateTime extends IProperty
{
    protected $fullDay;
    protected $dateTime;

    protected $valueparam = null;
    protected $tzidparam = null;

    public function __construct(\DateTime $dt, $fullDay = false)
    {
        $this->dateTime = $dt;
        $this->fullDay = boolval($fullDay);
        if ($this->fullDay) {
            $this->valueparam = \Jihoun\Calendar\Parameter\ValueDataTypes::date();
        } else {
            $this->valueparam = \Jihoun\Calendar\Parameter\ValueDataTypes::dateTime();
        }
    }

    public function getValue()
    {
        if ($this->fullDay) {
            return $this->dateTime->format('Ymd');
        } else {
            return $this->dateTime->format('Ymd\THis\Z');
        }
    }
}
