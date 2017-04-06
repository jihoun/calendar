<?php
namespace Jihoun\Calendar\Component;

use \Jihoun\Calendar\Property as Property;

/**
 * Provide a grouping of component properties that describe an event.
 */
class Event extends IComponent
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    protected $dtstamp;
    protected $uid;

    // The following is REQUIRED if the component
    // appears in an iCalendar object that doesn't
    // specify the "METHOD" property; otherwise, it
    // is OPTIONAL; in any case, it MUST NOT occur
    // more than once.
    protected $dtstart;

    // The following are OPTIONAL,
    // but MUST NOT occur more than once.
    protected $class = null;
    protected $created = null;
    protected $description = null;
    protected $geo = null;
    protected $lastMod = null;
    protected $location = null;
    protected $organizer = null;
    protected $priority = null;
    protected $seq = null;
    protected $status = null;
    protected $summary = null;
    protected $transp = null;
    protected $url = null;
    protected $recurid = null;

    // The following is OPTIONAL,
    // but SHOULD NOT occur more than once.
    protected $rrule = null;

    // Either 'dtend' or 'duration' MAY appear in
    // a 'eventprop', but 'dtend' and 'duration'
    // MUST NOT occur in the same 'eventprop'.
    protected $dtend = null;
    protected $duration = null;

    // The following are OPTIONAL,
    // and MAY occur more than once.
    protected $attachList = array();
    protected $attendeeList = array();
    protected $categoriesList = array();
    protected $commentList = array();
    protected $contactList = array();
    protected $exdateList = array();
    protected $rstatusList = array();
    protected $relatedList = array();
    protected $resourcesList = array();
    protected $rdateList = array();
    protected $xPropList = array();
    protected $ianaPropList = array();

    /**
     * Event constructor.
     */
    public function __construct()
    {
        $this->dtstamp = new Property\DateTimeStamp();
        $this->uid = new Property\Uid();
    }

    /**
     * @return array
     */
    private function getProperties()
    {
        $res = array (
            $this->dtstamp,
            $this->uid,
            $this->dtstart,
            $this->class,
            $this->created,
            $this->description,
            $this->geo,
            $this->lastMod,
            $this->location,
            $this->organizer,
            $this->priority,
            $this->seq,
            $this->status,
            $this->summary,
            $this->transp,
            $this->url,
            $this->recurid,
            $this->rrule
        );
        if (!is_null($this->dtend)) {
            $res[] = $this->dtend;
        } elseif (!is_null($this->duration)) {
            $res[] = $this->duration;
        }

        $res = array_merge(
            $res,
            $this->attachList,
            $this->attendeeList,
            $this->categoriesList,
            $this->commentList,
            $this->contactList,
            $this->exdateList,
            $this->rstatusList,
            $this->relatedList,
            $this->resourcesList,
            $this->rdateList,
            $this->xPropList,
            $this->ianaPropList
        );
        return $res;
    }

    /**
     * @return string
     */
    public function toString()
    {
        $res = "BEGIN:VEVENT\n";
        foreach ($this->getProperties() as $property) {
            if (!is_null($property)) {
                $res .= $property->toString();
            }
        }
        $res .= "END:VEVENT\n";
        return $res;
    }

    /**
     * @return \Jihoun\Calendar\Property\Uid
     */
    public function &getUid()
    {
        return $this->uid;
    }

    /**
     * @param \Jihoun\Calendar\Property\DateTimeStart $dtstart
     * @return $this
     */
    public function &setDateTimeStart(Property\DateTimeStart $dtstart)
    {
        $this->dtstart = $dtstart;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Classification $class
     * @return $this
     */
    public function &setClassification(Property\Classification $class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\DateTimeCreated $created
     * @return $this
     */
    public function &setDateTimeCreated(Property\DateTimeCreated $created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Description $description
     * @return $this
     */
    public function &setDescription(Property\Description $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\GeographicPosition $geo
     * @return $this
     */
    public function &setGeographicPosition(Property\GeographicPosition $geo)
    {
        $this->geo = $geo;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\LastModified $lastMod
     * @return $this
     */
    public function &setLastModified(Property\LastModified $lastMod)
    {
        $this->lastMod = $lastMod;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Location $location
     * @return $this
     */
    public function &setLocation(Property\Location $location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Organizer $organizer
     * @return $this
     */
    public function &setOrganizer(Property\Organizer $organizer)
    {
        $this->organizer = $organizer;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Priority $priority
     * @return $this
     */
    public function &setPriority(Property\Priority $priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\SequenceNumber $seq
     * @return $this
     */
    public function &setSequenceNumber(Property\SequenceNumber $seq)
    {
        $this->seq = $seq;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\EventStatus $status
     * @return $this
     */
    public function &setStatus(Property\EventStatus $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Summary $summary
     * @return $this
     */
    public function &setSummary(Property\Summary $summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\TimeTransparency $transp
     * @return $this
     */
    public function &setTimeTransparency(Property\TimeTransparency $transp)
    {
        $this->transp = $transp;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Url $url
     * @return $this
     */
    public function &setUrl(Property\Url $url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\RecurrenceId $recurid
     * @return $this
     */
    public function &setRecurrenceId(Property\RecurrenceId $recurid)
    {
        $this->recurid = $recurid;
        return $this;
    }

    /**
     * @param Property\RecurrenceRule $rrule
     * @return $this
     */
    public function &setRecurrenceRule(Property\RecurrenceRule $rrule)
    {
        $this->rrule = $rrule;
        return $this;
    }

    /**
     * @param Property\DateTimeEnd $dtend
     * @return $this
     */
    public function &setDateTimeEnd(Property\DateTimeEnd $dtend)
    {
        $this->dtend = $dtend;
        return $this;
    }

    /**
     * @param Property\Duration $duration
     * @return $this
     */
    public function &setDuration(Property\Duration $duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @param Property\Attachment $attach
     * @return $this
     */
    public function &addAttachment(Property\Attachment $attach)
    {
        $this->attachList[] = $attach;
        return $this;
    }

    /**
     * @param Property\Attendee $attendee
     * @return $this
     */
    public function &addAttendee(Property\Attendee $attendee)
    {
        $this->attendeeList[] = $attendee;
        return $this;
    }

    /**
     * @param Property\Categories $categories
     * @return $this
     */
    public function &addCategories(Property\Categories $categories)
    {
        $this->categoriesList[] = $categories;
        return $this;
    }

    /**
     * @param Property\Comment $comment
     * @return $this
     */
    public function &addComment(Property\Comment $comment)
    {
        $this->commentList[] = $comment;
        return $this;
    }

    /**
     * @param Property\Contact $contact
     * @return $this
     */
    public function &addContact(Property\Contact $contact)
    {
        $this->contactList[] = $contact;
        return $this;
    }

    /**
     * @param Property\ExceptionDateTimes $exDate
     * @return $this
     */
    public function &addExceptionDateTimes(Property\ExceptionDateTimes $exDate)
    {
        $this->exdateList[] = $exDate;
        return $this;
    }

    /**
     * @param Property\RequestStatus $rstatus
     * @return $this
     */
    public function &addRequestStatus(Property\RequestStatus $rstatus)
    {
        $this->rstatusList[] = $rstatus;
        return $this;
    }

    /**
     * @param Property\RelatedTo $related
     * @return $this
     */
    public function &addRelatedTo(Property\RelatedTo $related)
    {
        $this->relatedList[] = $related;
        return $this;
    }

    /**
     * @param Property\Resources $resources
     * @return $this
     */
    public function &addResources(Property\Resources $resources)
    {
        $this->resourcesList[] = $resources;
        return $this;
    }

    /**
     * @param Property\RecurrenceDateTimes $rDate
     * @return $this
     */
    public function &addRecurrenceDateTimes(Property\RecurrenceDateTimes $rDate)
    {
        $this->rdateList[] = $rDate;
        return $this;
    }

    /**
     * @param Property\XProperty $xProp
     * @return $this
     */
    public function &addXProperty(Property\XProperty $xProp)
    {
        $this->xPropList[] = $xProp;
        return $this;
    }

    /**
     * @param Property\IanaProperty $ianaProp
     * @return $this
     */
    public function &addIanaProperty(Property\IanaProperty $ianaProp)
    {
        $this->ianaPropList[] = $ianaProp;
        return $this;
    }
}
