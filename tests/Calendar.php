<?php

namespace Test\Jihoun\Calendar;

use \Jihoun\Calendar\Component as Component;
use \Jihoun\Calendar\Property as Property;

class CalendarTest extends \PHPUnit_Framework_TestCase
{
    public function testCalendar()
    {
        $event = new Component\Event();
        $todo = new Component\ToDo();
        $journal = new Component\Journal();

        $exDateTime1 = new Property\ExceptionDateTimes();
        $dt = new \DateTime();
        $dt->setDate(2018, 12, 25);
        $exDateTime1->addValue($dt);
        $dt = new \DateTime();
        $dt->setDate(2018, 12, 25);
        $exDateTime1->addValue($dt);
        $exDateTime2 = new Property\ExceptionDateTimes(true);
        $dt = new \DateTime();
        $dt->setDate(2018, 12, 6);
        $exDateTime2->addValue($dt);
        $dt = new \DateTime();
        $dt->setDate(2018, 12, 6);
        $exDateTime2->addValue($dt);
        $categories = new Property\Categories();
        $categories->addValue('APPOINTMENT')
                    ->addValue('EDUCATION');
        $resources = new Property\Resources(array('EASEL', 'PROJECTOR', 'VCR'));
        $rrule = new Property\RecurrenceRule();
        $attachment = Property\Attachment::binary('<html><body>Hello my friend!</body></html>');

        $event
            ->setDateTimeStart(new Property\DateTimeStart(new \DateTime()))
            ->setClassification(new Property\Classification())
            ->setDateTimeCreated(new Property\DateTimeCreated())
            ->setDescription(new Property\Description('Very very lengthy description
            with a line break and some other 
            one'))
            ->setGeographicPosition(new Property\GeographicPosition(1.5, 101))
            ->setLastModified(new Property\LastModified(new \DateTime()))
            ->setLocation(new Property\Location('in the office'))
            ->setOrganizer(new Property\Organizer('nicolas.lagier@gmail.com'))
            ->setPriority(new Property\Priority())
            ->setSequenceNumber(new Property\SequenceNumber())
            ->setStatus(Property\EventStatus::confirmed())
            ->setSummary(new Property\Summary('new test event'))
            ->setTimeTransparency(Property\TimeTransparency::TRANSPARENT())
            ->setUrl(new Property\Url('http://coaching.triedgeteam.com'))
            ->setRecurrenceId(new Property\RecurrenceId())
            ->setRecurrenceRule($rrule)//*
            ->setDateTimeEnd(new Property\DateTimeEnd(new \DateTime()))
            // ->setDuration(new Property\Duration(0, 1, 1, 1, 1))
            ->addAttachment($attachment)
            ->addAttendee(new Property\Attendee('nicolas.cadeaux@gmail.com'))
            ->addCategories($categories)
            ->addComment(new Property\Comment('Hi there!'))
            ->addContact(new Property\Contact("John Wayne"))
            ->addExceptionDateTimes($exDateTime1)
            ->addExceptionDateTimes($exDateTime2)
            ->addRequestStatus(new Property\RequestStatus('Success', Property\RequestStatus::SUCCESFUL))
            ->addRelatedTo(new Property\RelatedTo($todo))
            ->addResources($resources)
            ->addRecurrenceDateTimes(new Property\RecurrenceDateTimes());//*
        $event->getUid()->setValue('123456789');

        $todo
            ->setClassification(new Property\Classification())
            ->setDateTimeCompleted(new Property\DateTimeCompleted(new \DateTime()))
            ->setDateTimeCreated(new Property\DateTimeCreated())
            ->setDescription(new Property\Description('Very very lengthy description'))
            ->setDateTimeStart(new Property\DateTimeStart(new \DateTime()))
            ->setGeographicPosition(new Property\GeographicPosition(2.2, 95))
            ->setLastModified(new Property\LastModified(new \DateTime()))
            ->setLocation(new Property\Location('Home'))
            ->setOrganizer(new Property\Organizer('nicolas.lagier@gmail.com'))
            ->setPercentComplete(new Property\PercentComplete(42))
            ->setPriority(new Property\Priority(20))
            ->setRecurrenceId(new Property\RecurrenceId())
            ->setSequenceNumber(new Property\SequenceNumber())
            ->setStatus(Property\ToDoStatus::needsAction())
            ->setSummary(new Property\Summary('TODO do the summary'))
            ->setUrl(new Property\Url('http://coaching.triedgeteam.com'))
            ->setRecurrenceRule($rrule)
            ->setDateTimeDue(new Property\DateTimeDue(new \DateTime()))
            ->setDuration(new Property\Duration())
            ->addAttachment($attachment)
            ->addAttendee(new Property\Attendee('nicolas.cadeaux@gmail.com'))
            ->addCategories($categories)
            ->addComment(new Property\Comment('Yo!'))
            ->addContact(new Property\Contact('John Mcnroe'))
            ->addExceptionDateTimes($exDateTime1)
            ->addExceptionDateTimes($exDateTime2)
            ->addRequestStatus(new Property\RequestStatus('Success', Property\RequestStatus::SUCCESFUL))
            ->addRelatedTo(new Property\RelatedTo($event))
            ->addResources($resources)
            ->addRecurrenceDateTimes(new Property\RecurrenceDateTimes());

        $journal
            ->setClassification(new Property\Classification())
            ->setDateTimeCreated(new Property\DateTimeCreated())
            ->setDateTimeStart(new Property\DateTimeStart(new \DateTime()))
            ->setLastModified(new Property\LastModified(new \DateTime()))
            ->setOrganizer(new Property\Organizer('nicolas.cadeaux@gmail.com'))
            ->setRecurrenceId(new Property\RecurrenceId())
            ->setSequenceNumber(new Property\SequenceNumber())
            ->setStatus(Property\JournalStatus::draft())
            ->setSummary(new Property\Summary('Summary of my journal'))
            ->setUrl(new Property\Url('http://coaching.triedgeteam.com'))
            ->setRecurrenceRule($rrule)
            ->addAttachment($attachment)
            ->addAttendee(new Property\Attendee('nicolas.cadeaux@gmail.com'))
            ->addCategories($categories)
            ->addComment(new Property\Comment('Hello'))
            ->addContact(new Property\Contact('John Doe'))
            ->addDescription(new Property\Description('New Description on the journal front'))
            ->addExceptionDateTimes($exDateTime1)
            ->addExceptionDateTimes($exDateTime2)
            ->addRelatedTo(new Property\RelatedTo($event))
            ->addRecurrenceDateTimes(new Property\RecurrenceDateTimes())
            ->addRequestStatus(new Property\RequestStatus('Success', Property\RequestStatus::SUCCESFUL));

        $freeBusy = new Component\FreeBusy();
        $freeBusy
            ->setContact(new Property\Contact('Nicolas Lagier'))
            ->setDateTimeStart(new Property\DateTimeStart(new \DateTime()))
            ->setDateTimeEnd(new Property\DateTimeEnd(new \DateTime()))
            ->setOrganizer(new Property\Organizer('nicolas.lagier@gmail.com'))
            ->setUrl(new Property\Url('http://coaching.triedgeteam.com'))
            ->addAttendee(new Property\Attendee('nicolas.cadeaux@gmail.com'))
            ->addComment(new Property\Comment('Bonjour'))
            ->addFreeBusy(new Property\FreeBusyTime())
            ->addRequestStatus(new Property\RequestStatus('Success', Property\RequestStatus::SUCCESFUL));

        $tz = new Component\TimeZone();
        $tz->setLastModified(new Property\LastModified(new \DateTime()))
            ->setTimeZoneUrl(new Property\TimeZoneUrl('http://coaching.triedgeteam.com'))
            ->addStandardc(new Property\TimeZoneProperty(new Property\DateTimeStart(new \DateTime())))
            ->addDaylightc(new Property\TimeZoneProperty(new Property\DateTimeStart(new \DateTime())));

        $cal = new \Jihoun\Calendar\Calendar();
        $cal->addComponent($event);
        $cal->addComponent($todo);
        $cal->addComponent($journal);
        $cal->addComponent($freeBusy);
        
        $cal->addTimeZone($tz);

        // file_put_contents('/Users/nicolaslagier/workspace/triedge/calendar/tmp/test.ics', $cal->toString());
    }
}
