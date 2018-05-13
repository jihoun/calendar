<?php
namespace Jihoun\Calendar\Property;

/**
 * This property specifies the date and time that the calendar information was
 * created by the calendar user agent in the calendar store.
 *
 * This is analogous to the creation date and time for a file in the file
 * system.
 */
class DateTimeCreated extends IDateTime
{
    const NAME = 'CREATED';
    
    public function __construct(?\DateTimeInterface $dt = null)
    {
        $dt = is_null($dt) ? new \DateTime() : $dt;
        parent::__construct($dt);
    }
}
