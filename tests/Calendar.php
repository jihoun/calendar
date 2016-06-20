<?php

namespace Test\Triedge\Calendar;

class Calendar extends \PHPUnit_Framework_TestCase
{
    public function testCalendar()
    {
        $event = new \Triedge\Calendar\Component\Event();
        $todo = new \Triedge\Calendar\Component\ToDo();

        $event
            ->setClassification(new \Triedge\Calendar\Property\Classification())
            ->setDateTimeCreated(new \Triedge\Calendar\Property\DateTimeCreated())
            ->setDescription(new \Triedge\Calendar\Property\Description('Very very lengthy description'))
            ->setGeographicPosition(new \Triedge\Calendar\Property\GeographicPosition(1.5, 101))
            ->setLastModified(new \Triedge\Calendar\Property\LastModified(new \DateTime()))
            ->setLocation(new \Triedge\Calendar\Property\Location('in the office'))
            ->setOrganizer(new \Triedge\Calendar\Property\Organizer())
            ->setPriority(new \Triedge\Calendar\Property\Priority())
            ->setSequenceNumber(new \Triedge\Calendar\Property\SequenceNumber())
            // ->setStatus(new \Triedge\Calendar\Property\Status())
            ->setSummary(new \Triedge\Calendar\Property\Summary('new test event'))
            ->setTimeTransparency(new \Triedge\Calendar\Property\TimeTransparency())
            ->setUrl(new \Triedge\Calendar\Property\Url())
            ->setRecurrenceId(new \Triedge\Calendar\Property\RecurrenceId())
            //TODO rrule
            ->setDateTimeEnd(new \Triedge\Calendar\Property\DateTimeEnd(new \DateTime()))
            ->setDuration(new \Triedge\Calendar\Property\Duration())
            ->addAttachment(new \Triedge\Calendar\Property\Attachment())
            ->addAttendee(new \Triedge\Calendar\Property\Attendee())
            ->addCategories(new \Triedge\Calendar\Property\Categories())
            ->addComment(new \Triedge\Calendar\Property\Comment('Hi there!'))
            ->addContact(new \Triedge\Calendar\Property\Contact("John Wayne"))
            ->addExceptionDateTimes(new \Triedge\Calendar\Property\ExceptionDateTimes())
            ->addRequestStatus(new \Triedge\Calendar\Property\RequestStatus())
            ->addRelatedTo(new \Triedge\Calendar\Property\RelatedTo($todo))
            ->addResources(new \Triedge\Calendar\Property\Resources())
            ->addRecurrenceDateTimes(new \Triedge\Calendar\Property\RecurrenceDateTimes());


        $todo
            ->setClassification(new \Triedge\Calendar\Property\Classification())
            ->setDateTimeCompleted(new \Triedge\Calendar\Property\DateTimeCompleted(new \DateTime()))
            ->setDateTimeCreated(new \Triedge\Calendar\Property\DateTimeCreated())
            ->setDescription(new \Triedge\Calendar\Property\Description('Very very lengthy description'))
            ->setDateTimeStart(new \Triedge\Calendar\Property\DateTimeStart(new \DateTime()))
            ->setGeographicPosition(new \Triedge\Calendar\Property\GeographicPosition(2.2, 95))
            ->setLastModified(new \Triedge\Calendar\Property\LastModified(new \DateTime()))
            ->setLocation(new \Triedge\Calendar\Property\Location('Home'))
            ->setOrganizer(new \Triedge\Calendar\Property\Organizer())
            ->setPercentComplete(new \Triedge\Calendar\Property\PercentComplete(42))
            ->setPriority(new \Triedge\Calendar\Property\Priority(20))
            ->setRecurrenceId(new \Triedge\Calendar\Property\RecurrenceId())
            ->setSequenceNumber(new \Triedge\Calendar\Property\SequenceNumber())
            // ->setStatus(new \Triedge\Calendar\Property\Status())
            ->setSummary(new \Triedge\Calendar\Property\Summary('TODO do the summary'))
            ->setUrl(new \Triedge\Calendar\Property\Url())
            //TODO rrule
            ->setDateTimeDue(new \Triedge\Calendar\Property\DateTimeDue())
            ->setDuration(new \Triedge\Calendar\Property\Duration())
            ->addAttachment(new \Triedge\Calendar\Property\Attachment())
            ->addAttendee(new \Triedge\Calendar\Property\Attendee())
            ->addCategories(new \Triedge\Calendar\Property\Categories())
            ->addComment(new \Triedge\Calendar\Property\Comment('Yo!'))
            ->addContact(new \Triedge\Calendar\Property\Contact('John Mcnroe'));

        // $journal = new \Triedge\Calendar\Component\Journal();
        // $journal->addComment(new \Triedge\Calendar\Property\Comment('Hello'))
        //     ->addDescription(new \Triedge\Calendar\Property\Description('Very very lengthy description'));

        // $freeBusy = new \Triedge\Calendar\Component\FreeBusy();
        // $freeBusy->addComment(new \Triedge\Calendar\Property\Comment('Bonjour'));

        $cal = new \Triedge\Calendar\Calendar();
        $cal->addComponent($event);
            // ->addComponent($freeBusy)
            // ->addComponent($journal)
            // ->addComponent(new \Triedge\Calendar\Component\TimeZone())
            // ->addComponent($todo);

        file_put_contents('/Users/nicolaslagier/workspace/triedge/calendar/test.ics', $cal->toString());
    }
}
