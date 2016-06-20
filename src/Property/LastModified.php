<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies the date and time that the information associated
 * with the calendar component was last revised in the calendar store.
 *
 * Note: This is analogous to the modification date and time for a file in the
 * file system.
 */
class LastModified extends IDateTime
{
    const NAME = 'LAST-MODIFIED';
}
