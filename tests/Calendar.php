<?php

namespace Test\Triedge\Calendar;

class Calendar extends \PHPUnit_Framework_TestCase
{
    public function testCalendar()
    {
        $event = new \Triedge\Calendar\Component\Event();
        $event
            ->setClass(new \Triedge\Calendar\Property\Classification())
            ->setDateTimeCreated(new \Triedge\Calendar\Property\DateTimeCreated())
            ->setDescription(new \Triedge\Calendar\Property\Description('Very very lengthy description'))
            ->setGeographicPosition(new \Triedge\Calendar\Property\GeographicPosition(1.5, 101))
            ->setLastModified(new \Triedge\Calendar\Property\LastModified(new \DateTime()))
            ->setLocation(new \Triedge\Calendar\Property\Location('in the office'))
            
            ->setTimeTransparency(new \Triedge\Calendar\Property\TimeTransparency())
            ->setPriority(new \Triedge\Calendar\Property\Priority())
            ->addComment(new \Triedge\Calendar\Property\Comment('Hi there!'));


        // $todo = new \Triedge\Calendar\Component\ToDo();
        // $todo->addComment(new \Triedge\Calendar\Property\Comment('Yo!'))
        //     ->setDescription(new \Triedge\Calendar\Property\Description('Very very lengthy description'))
        //     ->setGeographicPosition(new \Triedge\Calendar\Property\GeographicPosition(2.2, 95))
        //     ->setLocation(new \Triedge\Calendar\Property\Location('Home'))
        //     ->setPercentComplete(new \Triedge\Calendar\Property\PercentComplete(42))
        //     ->setPriority(new \Triedge\Calendar\Property\Priority(20));

        // $journal = new \Triedge\Calendar\Component\Journal();
        // $journal->addComment(new \Triedge\Calendar\Property\Comment('Hello'))
        //     ->addDescription(new \Triedge\Calendar\Property\Description('Very very lengthy description'));

        // $freeBusy = new \Triedge\Calendar\Component\FreeBusy();
        // $freeBusy->addComment(new \Triedge\Calendar\Property\Comment('Bonjour'));

        $cal = new \Triedge\Calendar\Calendar();
        // $cal->addComponent(new \Triedge\Calendar\Component\Alarm())
        $cal->addComponent($event);
            // ->addComponent($freeBusy)
            // ->addComponent($journal)
            // ->addComponent(new \Triedge\Calendar\Component\TimeZone())
            // ->addComponent($todo);

        file_put_contents('/Users/nicolaslagier/workspace/triedge/calendar/test.ics', $cal->toString());
    }
}
