<?php
namespace Jihoun\Calendar\Component;

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

    public function __construct()
    {
        $this->dtstamp = new \Jihoun\Calendar\Property\DateTimeStamp();
        $this->uid = new \Jihoun\Calendar\Property\Uid();
    }

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

    public function &getUid()
    {
        return $this->uid;
    }

    public function &setDateTimeStart(\Jihoun\Calendar\Property\DateTimeStart $dtstart)
    {
        $this->dtstart = $dtstart;
        return $this;
    }

    public function &setClassification(\Jihoun\Calendar\Property\Classification $class)
    {
        $this->class = $class;
        return $this;
    }

    public function &setDateTimeCreated(\Jihoun\Calendar\Property\DateTimeCreated $created)
    {
        $this->created = $created;
        return $this;
    }

    public function &setDescription(\Jihoun\Calendar\Property\Description $description)
    {
        $this->description = $description;
        return $this;
    }

    public function &setGeographicPosition(\Jihoun\Calendar\Property\GeographicPosition $geo)
    {
        $this->geo = $geo;
        return $this;
    }
    
    public function &setLastModified(\Jihoun\Calendar\Property\LastModified $lastMod)
    {
        $this->lastMod = $lastMod;
        return $this;
    }

    public function &setLocation(\Jihoun\Calendar\Property\Location $location)
    {
        $this->location = $location;
        return $this;
    }
    
    public function &setOrganizer(\Jihoun\Calendar\Property\Organizer $organizer)
    {
        $this->organizer = $organizer;
        return $this;
    }

    public function &setPriority(\Jihoun\Calendar\Property\Priority $priority)
    {
        $this->priority = $priority;
        return $this;
    }

    public function &setSequenceNumber(\Jihoun\Calendar\Property\SequenceNumber $seq)
    {
        $this->seq = $seq;
        return $this;
    }
    
    public function &setStatus(\Jihoun\Calendar\Property\EventStatus $status)
    {
        $this->status = $status;
        return $this;
    }
    
    public function &setSummary(\Jihoun\Calendar\Property\Summary $summary)
    {
        $this->summary = $summary;
        return $this;
    }

    public function &setTimeTransparency(\Jihoun\Calendar\Property\TimeTransparency $transp)
    {
        $this->transp = $transp;
        return $this;
    }
    
    public function &setUrl(\Jihoun\Calendar\Property\Url $url)
    {
        $this->url = $url;
        return $this;
    }
    
    public function &setRecurrenceId(\Jihoun\Calendar\Property\RecurrenceId $recurid)
    {
        $this->recurid = $recurid;
        return $this;
    }

    public function &setRecurrenceRule(\Jihoun\Calendar\Property\RecurrenceRule $rrule)
    {
        $this->rrule = $rrule;
        return $this;
    }

    public function &setDateTimeEnd(\Jihoun\Calendar\Property\DateTimeEnd $dtend)
    {
        $this->dtend = $dtend;
        return $this;
    }

    public function &setDuration(\Jihoun\Calendar\Property\Duration $duration)
    {
        $this->duration = $duration;
        return $this;
    }

    public function &addAttachment(\Jihoun\Calendar\Property\Attachment $attach)
    {
        $this->attachList[] = $attach;
        return $this;
    }

    public function &addAttendee(\Jihoun\Calendar\Property\Attendee $attendee)
    {
        $this->attendeeList[] = $attendee;
        return $this;
    }

    public function &addCategories(\Jihoun\Calendar\Property\Categories $categories)
    {
        $this->categoriesList[] = $categories;
        return $this;
    }

    public function &addComment(\Jihoun\Calendar\Property\Comment $comment)
    {
        $this->commentList[] = $comment;
        return $this;
    }

    public function &addContact(\Jihoun\Calendar\Property\Contact $contact)
    {
        $this->contactList[] = $contact;
        return $this;
    }

    public function &addExceptionDateTimes(\Jihoun\Calendar\Property\ExceptionDateTimes $exDate)
    {
        $this->exdateList[] = $exDate;
        return $this;
    }

    public function &addRequestStatus(\Jihoun\Calendar\Property\RequestStatus $rstatus)
    {
        $this->rstatusList[] = $rstatus;
        return $this;
    }
    
    public function &addRelatedTo(\Jihoun\Calendar\Property\RelatedTo $related)
    {
        $this->relatedList[] = $related;
        return $this;
    }
    
    public function &addResources(\Jihoun\Calendar\Property\Resources $resources)
    {
        $this->resourcesList[] = $resources;
        return $this;
    }
    
    public function &addRecurrenceDateTimes(\Jihoun\Calendar\Property\RecurrenceDateTimes $rDate)
    {
        $this->rdateList[] = $rDate;
        return $this;
    }
    
    public function &addXProperty(\Jihoun\Calendar\Property\XProperty $xProp)
    {
        $this->xPropList[] = $xProp;
        return $this;
    }

    public function &addIanaProperty(\Jihoun\Calendar\Property\IanaProperty $ianaProp)
    {
        $this->ianaPropList[] = $ianaProp;
        return $this;
    }
}
