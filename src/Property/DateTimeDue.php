<?php
namespace Jihoun\Calendar\Property;

use Jihoun\Calendar\Parameter\ValueDataTypes;

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

    public function __construct(\DateTimeInterface $dt, bool $fullDay = false)
    {
        parent::__construct($dt);
        $this->fullDay = boolval($fullDay);
        if ($fullDay) {
            $this->valueparam = ValueDataTypes::date();
        } else {
            $this->valueparam = ValueDataTypes::DateTime();
        }
    }

    public function getValue(): ?string
    {
        if (!$this->fullDay) {
            return parent::getValue();
        }
        return $this->dateTime->format('Ymd');
    }

    public function getParams(): array
    {
        return [$this->valueparam, $this->tzidparam];
    }
}
