<?php
namespace Jihoun\Calendar\Property;

use Jihoun\Calendar\Parameter\ValueDataTypes;

/**
 * This property defines the list of DATE-TIME exceptions for recurring events,
 * to-dos, journal entries, or time zone definitions.
 */
class ExceptionDateTimes extends IProperty
{
    const NAME = 'EXDATE';
    
    protected $valueparam = null; //"VALUE" "=" ("DATE-TIME" / "DATE")) /
    protected $tzidparam = null;

    protected $values = [];
    protected $fullDay;

    public function __construct(bool $fullDay = false)
    {
        $this->fullDay = $fullDay;
        if ($this->fullDay) {
            $this->valueparam = ValueDataTypes::date();
        } else {
            $this->valueparam = ValueDataTypes::dateTime();
        }
    }

    public function getValue(): ?string
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

    public function addValue(\DateTimeInterface $dt): ExceptionDateTimes
    {
        $this->values[] = $dt;
        return $this;
    }

    public function getParams(): array
    {
        return [$this->valueparam, $this->tzidparam];
    }
}
