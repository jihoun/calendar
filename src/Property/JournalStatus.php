<?php
namespace Triedge\Calendar\Property;

class JournalStatus extends Status
{
    const DRAFT         = 'DRAFT';          //Indicates journal is draft.
    const FINAL_        = 'FINAL';          //Indicates journal is final.

    public static function draft()
    {
        return new static(static::DRAFT);
    }

    public static function finalP()
    {
        return new static(static::FINAL_);
    }
}
