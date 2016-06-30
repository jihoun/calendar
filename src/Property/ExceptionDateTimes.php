<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the list of DATE-TIME exceptions for recurring events,
 * to-dos, journal entries, or time zone definitions.
 */
class ExceptionDateTimes extends IProperty
{
    const NAME = 'EXDATE';
    
    protected $valueparam = null; //"VALUE" "=" ("DATE-TIME" / "DATE")) /
    protected $tzidparam = null;

    protected $values = array();
    protected $fullDay;

    public function __construct($fullDay = false)
    {
        $this->fullDay = boolval($fullDay);
        if ($this->fullDay) {
            $this->valueparam = \Triedge\Calendar\Parameter\ValueDataTypes::date();
        } else {
            $this->valueparam = \Triedge\Calendar\Parameter\ValueDataTypes::dateTime();
        }
    }

    public function getValue()
    {
        if (empty($this->values)) {
            return null;
        } else {
            $res = '';
            foreach ($this->values as $value) {
                if ($this->fullDay) {
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
        $this->values[] = $dt;
    }

    public function getParams()
    {
        return array($this->valueparam, $this->tzidparam);
    }
}
