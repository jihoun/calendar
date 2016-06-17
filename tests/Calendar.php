<?php

namespace Test\Triedge\Calendar;

class Calendar extends \PHPUnit_Framework_TestCase
{
    public function testCalendar()
    {
        $cal = new \Triedge\Calendar\Calendar();
        $event = new \Triedge\Calendar\Component\Event();
        $event->setTimeTransparency(new \Triedge\Calendar\Property\TimeTransparency());
        $cal->addComponent(new \Triedge\Calendar\Component\Alarm());
        $cal->addComponent($event);
        $cal->addComponent(new \Triedge\Calendar\Component\FreeBusy());
        $cal->addComponent(new \Triedge\Calendar\Component\Journal());
        $cal->addComponent(new \Triedge\Calendar\Component\TimeZone());
        $cal->addComponent(new \Triedge\Calendar\Component\ToDo());
        file_put_contents('/Users/nicolaslagier/workspace/triedge/calendar/test.ics', $cal->toString());
    }
}
