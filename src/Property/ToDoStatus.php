<?php
namespace Triedge\Calendar\Property;

class ToDoStatus extends Status
{
    const NEEDS_ACTION  = 'NEEDS-ACTION';   //Indicates to-do needs action.
    const COMPLETED     = 'COMPLETED';      //Indicates to-do completed.
    const IN_PROCESS    = 'IN-PROCESS';     //Indicates to-do in process of.

    public static function needsAction()
    {
        return new static(static::NEEDS_ACTION);
    }

    public static function completed()
    {
        return new static(static::COMPLETED);
    }

    public static function inProcess()
    {
        return new static(static::IN_PROCESS);
    }
}
