<?php

namespace Test\Triedge\Calendar\Component;

use \Triedge\Calendar\Component as Component;
use \Triedge\Calendar\Property as Property;

class Event extends \PHPUnit_Framework_TestCase
{
	public function testEvent()
	{
        $event = new Component\Event();
        $rrule = new Property\RecurrenceRule();
        $attachment = Property\Attachment::binary('<html><body>Hello my friend!</body></html>');
        $exDateTime1 = new Property\ExceptionDateTimes();
        $dt = new \DateTime();
        $dt->setDate(2018, 12, 25);
        $exDateTime1->addValue($dt);
        $resources = new Property\Resources(array('EASEL', 'PROJECTOR', 'VCR'));
        $categories = new Property\Categories(array('TEST'));

	    $event
            ->setDateTimeStart(new Property\DateTimeStart(new \DateTime()))
            ->setClassification(new Property\Classification())
            ->setDateTimeCreated(new Property\DateTimeCreated())
            ->setDescription(new Property\Description('Very very lengthy description'))
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
            ->addRequestStatus(new Property\RequestStatus('Success', Property\RequestStatus::SUCCESFUL))
            // ->addRelatedTo(new Property\RelatedTo($todo))
            ->addResources($resources)
            ->addRecurrenceDateTimes(new Property\RecurrenceDateTimes());//*
        $event->getUid()->setValue('123456789');

        $eventStr = $event->toString();
        $this->assertTrue(is_string($eventStr));
	}
}
