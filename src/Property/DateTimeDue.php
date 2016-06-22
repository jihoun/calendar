<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the date and time that a to-do is expected to be
 * completed.
 * @todo  merge logic with dtstart and dtend
 */
class DateTimeDue extends IDateTime
{
    const NAME = 'DUE';

    protected $fullDay_;

    protected $valueparam_ = null; //"VALUE" "=" ("DATE-TIME" / "DATE")) /
    protected $tzidparam_ = null;

    public function __construct(\DateTime $dt, $fullDay = false)
    {
        parent::__construct($dt);
        $this->fullDay_ = boolval($fullDay);
        if ($fullDay) {
            $this->valueparam_ = \Triedge\Calendar\Parameter\ValueDataTypes::DATE();
        } else {
            $this->valueparam_ = \Triedge\Calendar\Parameter\ValueDataTypes::DATE_TIME();
        }
    }

    public function getValue()
    {
        if (!$this->fullDay_) {
            return parent::getValue();
        }
        return $this->dateTime_->format('Ymd');
    }

    public function getParams()
    {
        return array($this->valueparam_, $this->tzidparam_);
    }
}
