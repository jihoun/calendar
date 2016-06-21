<?php

namespace Test\Triedge\Calendar;

use \Triedge\Calendar\Component as Component;
use \Triedge\Calendar\Property as Property;

class CalendarTest extends \PHPUnit_Framework_TestCase
{
    public function testCalendar()
    {
        $event = new Component\Event();
        $todo = new Component\ToDo();

        $event
            ->setDateTimeStart(new Property\DateTimeStart(new \DateTime()))
            ->setClassification(new Property\Classification())
            ->setDateTimeCreated(new Property\DateTimeCreated())
            ->setDescription(new Property\Description('Very very lengthy description'))
            ->setGeographicPosition(new Property\GeographicPosition(1.5, 101))
            ->setLastModified(new Property\LastModified(new \DateTime()))
            ->setLocation(new Property\Location('in the office'))
            ->setOrganizer(new Property\Organizer())
            ->setPriority(new Property\Priority())
            ->setSequenceNumber(new Property\SequenceNumber())
            ->setStatus(new Property\Status(Property\Status::CONFIRMED))
            ->setSummary(new Property\Summary('new test event'))
            ->setTimeTransparency(new Property\TimeTransparency())
            ->setUrl(new Property\Url('http://coaching.triedgeteam.com'))
            // ->setRecurrenceId(new Property\RecurrenceId())
            //TODO rrule
            // ->setDateTimeEnd(new Property\DateTimeEnd(new \DateTime()))
            ->setDuration(new Property\Duration(0, 1, 1, 1, 1))
            ->addAttachment(new Property\Attachment())
            ->addAttendee(new Property\Attendee())
            ->addCategories(new Property\Categories())
            ->addComment(new Property\Comment('Hi there!'))
            ->addContact(new Property\Contact("John Wayne"))
            ->addExceptionDateTimes(new Property\ExceptionDateTimes())
            ->addRequestStatus(new Property\RequestStatus())
            ->addRelatedTo(new Property\RelatedTo($todo))
            ->addResources(new Property\Resources())
            ->addRecurrenceDateTimes(new Property\RecurrenceDateTimes());


        $todo
            ->setClassification(new Property\Classification())
            ->setDateTimeCompleted(new Property\DateTimeCompleted(new \DateTime()))
            ->setDateTimeCreated(new Property\DateTimeCreated())
            ->setDescription(new Property\Description('Very very lengthy description'))
            ->setDateTimeStart(new Property\DateTimeStart(new \DateTime()))
            ->setGeographicPosition(new Property\GeographicPosition(2.2, 95))
            ->setLastModified(new Property\LastModified(new \DateTime()))
            ->setLocation(new Property\Location('Home'))
            ->setOrganizer(new Property\Organizer())
            ->setPercentComplete(new Property\PercentComplete(42))
            ->setPriority(new Property\Priority(20))
            ->setRecurrenceId(new Property\RecurrenceId())
            ->setSequenceNumber(new Property\SequenceNumber())
            // ->setStatus(new Property\Status())
            ->setSummary(new Property\Summary('TODO do the summary'))
            ->setUrl(new Property\Url('http://coaching.triedgeteam.com'))
            //TODO rrule
            ->setDateTimeDue(new Property\DateTimeDue(new \DateTime()))
            ->setDuration(new Property\Duration())
            ->addAttachment(new Property\Attachment())
            ->addAttendee(new Property\Attendee())
            ->addCategories(new Property\Categories())
            ->addComment(new Property\Comment('Yo!'))
            ->addContact(new Property\Contact('John Mcnroe'));

        // $journal = new Component\Journal();
        // $journal->addComment(new Property\Comment('Hello'))
        //     ->addDescription(new Property\Description('Very very lengthy description'));

        // $freeBusy = new Component\FreeBusy();
        // $freeBusy->addComment(new Property\Comment('Bonjour'));

        $cal = new \Triedge\Calendar\Calendar();
        $cal->addComponent($event);
            // ->addComponent($freeBusy)
            // ->addComponent($journal)
            // ->addComponent(new Component\TimeZone())
        // $cal->addComponent($todo);

        file_put_contents('/Users/nicolaslagier/workspace/triedge/calendar/test.ics', $cal->toString());
    }
}
