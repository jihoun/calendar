<?php

namespace Test\Triedge\Calendar;

class Calendar extends \PHPUnit_Framework_TestCase
{
    public function testCalendar()
    {
        $cal = new \Triedge\Calendar\Calendar();
        $event = new \Triedge\Calendar\Event();
        $cal->addComponent($event);
        $cal->addComponent($event);
        file_put_contents('/Users/nicolaslagier/workspace/triedge/calendar/test.ics', $cal->toString());
    }
}
