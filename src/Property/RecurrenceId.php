<?php
namespace Triedge\Calendar\Property;

/**
 * This property is used in conjunction with the "UID" and "SEQUENCE" properties
 * to identify a specific instance of a recurring "VEVENT", "VTODO", or
 * "VJOURNAL" calendar component.
 * The property value is the original value of the "DTSTART" property of the
 * recurrence instance.
 */
class RecurrenceId extends IProperty
{
    const NAME = 'RECURRENCE-ID';

    protected $tzidparam_ = null;
    protected $rangeparam_ = null;
    protected $valueparam_ = null;    //"VALUE" "=" ("DATE-TIME" / "DATE")) 
    
    public function getValue()
    {
        //TODO
        return null;
    }

    public function getParams()
    {
        return array(
            $this->tzidparam_,
            $this->rangeparam_,
            $this->valueparam_
        );
    }
}
