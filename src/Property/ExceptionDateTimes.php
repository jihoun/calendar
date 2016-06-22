<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the list of DATE-TIME exceptions for recurring events,
 * to-dos, journal entries, or time zone definitions.
 */
class ExceptionDateTimes extends IProperty
{
    const NAME = 'EXDATE';
    
    protected $valueparam_ = null; //"VALUE" "=" ("DATE-TIME" / "DATE")) /
    protected $tzidparam_ = null;

    protected $values_ = array();
    protected $fullDay_;

    public function __construct($fullDay = false)
    {
        $this->fullDay_ = boolval($fullDay);
        if ($this->fullDay_) {
            $this->valueparam_ = \Triedge\Calendar\Parameter\ValueDataTypes::DATE();
        } else {
            $this->valueparam_ = \Triedge\Calendar\Parameter\ValueDataTypes::DATE_TIME();
        }
    }

    public function getValue()
    {
        if (empty($this->values_)) {
            return null;
        } else {
            $res = '';
            foreach ($this->values_ as $value) {
                if ($this->fullDay_) {
                    $res .= $value->format('Ymd,');
                } else {
                    $res .= $value->format('Ymd\THis\Z,');
                }
            }
            // remove last comma
            return substr($res, 0, -1);
        }
    }

    public function addValue(\DateTime $dt)
    {
        $this->values_[] = $dt;
    }

    public function getParams()
    {
        return array($this->valueparam_, $this->tzidparam_);
    }
}
