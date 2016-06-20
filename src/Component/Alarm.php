<?php
namespace Triedge\Calendar\Component;

/**
 * Provide a grouping of component properties that define an alarm.
 */
class Alarm
{
    //TODO
    
    public function toString()
    {
        $res = "BEGIN:VALARM\n";
        //TODO
        $res .= "END:VALARM\n";
        return $res;
    }
}
