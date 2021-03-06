<?php
namespace Jihoun\Calendar\Property;

/**
 * This property defines the date and time that a to-do is expected to be
 * completed.
 * @todo  merge logic with dtstart and dtend
 */
class DateTimeDue extends IDateTime
{
    const NAME = 'DUE';

    protected $fullDay;

    protected $valueparam = null; //"VALUE" "=" ("DATE-TIME" / "DATE")) /
    protected $tzidparam = null;

    public function __construct(\DateTime $dt, $fullDay = false)
    {
        parent::__construct($dt);
        $this->fullDay = boolval($fullDay);
        if ($fullDay) {
            $this->valueparam = \Jihoun\Calendar\Parameter\ValueDataTypes::date();
        } else {
            $this->valueparam = \Jihoun\Calendar\Parameter\ValueDataTypes::DateTime();
        }
    }

    public function getValue()
    {
        if (!$this->fullDay) {
            return parent::getValue();
        }
        return $this->dateTime->format('Ymd');
    }

    public function getParams()
    {
        return array($this->valueparam, $this->tzidparam);
    }
}
