<?php
namespace Jihoun\Calendar\Component;

/**
 * Provide a grouping of component properties that define an alarm.
 * @todo  implement
 */
class Alarm
{
    /**
     * @todo implement
     * @return string
     */
    public function toString()
    {
        $res = "BEGIN:VALARM\n";

        $res .= "END:VALARM\n";
        return $res;
    }
}
