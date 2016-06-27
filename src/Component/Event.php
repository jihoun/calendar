<?php
namespace Triedge\Calendar\Component;

/**
 * Provide a grouping of component properties that describe an event.
 */
class Event extends IComponent
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    protected $dtstamp_;
    protected $uid_;

    // The following is REQUIRED if the component
    // appears in an iCalendar object that doesn't
    // specify the "METHOD" property; otherwise, it
    // is OPTIONAL; in any case, it MUST NOT occur
    // more than once.
    protected $dtstart_;

    // The following are OPTIONAL,
    // but MUST NOT occur more than once.
    protected $class_ = null;
    protected $created_ = null;
    protected $description_ = null;
    protected $geo_ = null;
    protected $lastMod_ = null;
    protected $location_ = null;
    protected $organizer_ = null;
    protected $priority_ = null;
    protected $seq_ = null;
    protected $status_ = null;
    protected $summary_ = null;
    protected $transp_ = null;
    protected $url_ = null;
    protected $recurid_ = null;

    // The following is OPTIONAL,
    // but SHOULD NOT occur more than once.
    protected $rrule_ = null;

    // Either 'dtend' or 'duration' MAY appear in
    // a 'eventprop', but 'dtend' and 'duration'
    // MUST NOT occur in the same 'eventprop'.
    protected $dtend_ = null;
    protected $duration_ = null;

    // The following are OPTIONAL,
    // and MAY occur more than once.
    protected $attachList_ = array();
    protected $attendeeList_ = array();
    protected $categoriesList_ = array();
    protected $commentList_ = array();
    protected $contactList_ = array();
    protected $exdateList_ = array();
    protected $rstatusList_ = array();
    protected $relatedList_ = array();
    protected $resourcesList_ = array();
    protected $rdateList_ = array();
    protected $xPropList_ = array();
    protected $ianaPropList_ = array();

    public function __construct()
    {
        $this->dtstamp_ = new \Triedge\Calendar\Property\DateTimeStamp();
        $this->uid_ = new \Triedge\Calendar\Property\Uid();
    }

    private function getProperties()
    {
        $res = array (
            $this->dtstamp_,
            $this->uid_,
            $this->dtstart_,
            $this->class_,
            $this->created_,
            $this->description_,
            $this->geo_,
            $this->lastMod_,
            $this->location_,
            $this->organizer_,
            $this->priority_,
            $this->seq_,
            $this->status_,
            $this->summary_,
            $this->transp_,
            $this->url_,
            $this->recurid_,
            $this->rrule_
        );
        if (!is_null($this->dtend_)) {
            $res[] = $this->dtend_;
        } elseif (!is_null($this->duration_)) {
            $res[] = $this->duration_;
        }

        $res = array_merge(
            $res,
            $this->attachList_,
            $this->attendeeList_,
            $this->categoriesList_,
            $this->commentList_,
            $this->contactList_,
            $this->exdateList_,
            $this->rstatusList_,
            $this->relatedList_,
            $this->resourcesList_,
            $this->rdateList_,
            $this->xPropList_,
            $this->ianaPropList_
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
        return $this->uid_;
    }

    public function &setDateTimeStart(\Triedge\Calendar\Property\DateTimeStart $dtstart)
    {
        $this->dtstart_ = $dtstart;
        return $this;
    }

    public function &setClassification(\Triedge\Calendar\Property\Classification $class)
    {
        $this->class_ = $class;
        return $this;
    }

    public function &setDateTimeCreated(\Triedge\Calendar\Property\DateTimeCreated $created)
    {
        $this->created_ = $created;
        return $this;
    }

    public function &setDescription(\Triedge\Calendar\Property\Description $description)
    {
        $this->description_ = $description;
        return $this;
    }

    public function &setGeographicPosition(\Triedge\Calendar\Property\GeographicPosition& $geo)
    {
        $this->geo_ = $geo;
        return $this;
    }
    
    public function &setLastModified(\Triedge\Calendar\Property\LastModified $lastMod)
    {
        $this->lastMod_ = $lastMod;
        return $this;
    }

    public function &setLocation(\Triedge\Calendar\Property\Location $location)
    {
        $this->location_ = $location;
        return $this;
    }
    
    public function &setOrganizer(\Triedge\Calendar\Property\Organizer $organizer)
    {
        $this->organizer_ = $organizer;
        return $this;
    }

    public function &setPriority(\Triedge\Calendar\Property\Priority $priority)
    {
        $this->priority_ = $priority;
        return $this;
    }

    public function &setSequenceNumber(\Triedge\Calendar\Property\SequenceNumber $seq)
    {
        $this->seq_ = $seq;
        return $this;
    }
    
    public function &setStatus(\Triedge\Calendar\Property\EventStatus $status)
    {
        $this->status_ = $status;
        return $this;
    }
    
    public function &setSummary(\Triedge\Calendar\Property\Summary $summary)
    {
        $this->summary_ = $summary;
        return $this;
    }

    public function &setTimeTransparency(\Triedge\Calendar\Property\TimeTransparency $transp)
    {
        $this->transp_ = $transp;
        return $this;
    }
    
    public function &setUrl(\Triedge\Calendar\Property\Url $url)
    {
        $this->url_ = $url;
        return $this;
    }
    
    public function &setRecurrenceId(\Triedge\Calendar\Property\RecurrenceId $recurid)
    {
        $this->recurid_ = $recurid;
        return $this;
    }

    public function &setRecurrenceRule(\Triedge\Calendar\Property\RecurrenceRule $rrule)
    {
        $this->rrule_ = $rrule;
        return $this;
    }

    public function &setDateTimeEnd(\Triedge\Calendar\Property\DateTimeEnd $dtend)
    {
        $this->dtend_ = $dtend;
        return $this;
    }

    public function &setDuration(\Triedge\Calendar\Property\Duration $duration)
    {
        $this->duration_ = $duration;
        return $this;
    }

    public function &addAttachment(\Triedge\Calendar\Property\Attachment $attach)
    {
        $this->attachList_[] = $attach;
        return $this;
    }

    public function &addAttendee(\Triedge\Calendar\Property\Attendee $attendee)
    {
        $this->attendeeList_[] = $attendee;
        return $this;
    }

    public function &addCategories(\Triedge\Calendar\Property\Categories $categories)
    {
        $this->categoriesList_[] = $categories;
        return $this;
    }

    public function &addComment(\Triedge\Calendar\Property\Comment $comment)
    {
        $this->commentList_[] = $comment;
        return $this;
    }

    public function &addContact(\Triedge\Calendar\Property\Contact $contact)
    {
        $this->contactList_[] = $contact;
        return $this;
    }

    public function &addExceptionDateTimes(\Triedge\Calendar\Property\ExceptionDateTimes $exDate)
    {
        $this->exdateList_[] = $exDate;
        return $this;
    }

    public function &addRequestStatus(\Triedge\Calendar\Property\RequestStatus $rstatus)
    {
        $this->rstatusList_[] = $rstatus;
        return $this;
    }
    
    public function &addRelatedTo(\Triedge\Calendar\Property\RelatedTo $related)
    {
        $this->relatedList_[] = $related;
        return $this;
    }
    
    public function &addResources(\Triedge\Calendar\Property\Resources $resources)
    {
        $this->resourcesList_[] = $resources;
        return $this;
    }
    
    public function &addRecurrenceDateTimes(\Triedge\Calendar\Property\RecurrenceDateTimes $rDate)
    {
        $this->rdateList_[] = $rDate;
        return $this;
    }
    
    public function &addXProperty(\Triedge\Calendar\Property\XProperty $xProp)
    {
        $this->x_propList_[] = $xProp;
        return $this;
    }

    public function &addIanaProperty(\Triedge\Calendar\Property\IanaProperty $ianaProp)
    {
        $this->iana_propList_[] = $ianaProp;
        return $this;
    }
}
