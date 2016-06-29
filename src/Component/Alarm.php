<?php
namespace Triedge\Calendar\Component;

/**
 * Provide a grouping of component properties that define an alarm.
 * @todo  implement
 */
class Alarm
{
    /**
     * @todo implement
     * @return string|null
     */
    public function toString()
    {
        $res = "BEGIN:VALARM\n";

        $res .= "END:VALARM\n";
        return $res;
    }
}
