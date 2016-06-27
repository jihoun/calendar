<?php
namespace Triedge\Calendar\Component;

/**
 * Provide a grouping of calendar properties that describe a to-do.
 */
class ToDo extends IComponent
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    protected $dtstamp_;
    protected $uid_;
    // The following are OPTIONAL,
    // but MUST NOT occur more than once.
    protected $class_ = null;
    protected $completed_ = null;
    protected $created_ = null;
    protected $description_ = null;
    protected $dtstart_ = null;
    protected $geo_ = null;
    protected $last_mod_ = null;
    protected $location_ = null;
    protected $organizer_ = null;
    protected $percent_ = null;
    protected $priority_ = null;
    protected $recurid_ = null;
    protected $seq_ = null;
    protected $status_ = null;
    protected $summary_ = null;
    protected $url_ = null;
    // The following is OPTIONAL,
    // but SHOULD NOT occur more than once.
    protected $rrule_ = null;
    // Either 'due' or 'duration' MAY appear in
    // a 'todoprop', but 'due' and 'duration'
    // MUST NOT occur in the same 'todoprop'.
    // If 'duration' appear in a 'todoprop',
    // then 'dtstart' MUST also appear in
    // the same 'todoprop'.
    protected $due_;
    protected $duration_;
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
    protected $x_propList_ = array();
    protected $iana_propList_ = array();

    public function __construct()
    {
        $this->dtstamp_ = new \Triedge\Calendar\Property\DateTimeStamp();
        $this->uid_ = new \Triedge\Calendar\Property\Uid();
    }

    private function getProperties()
    {
        $res = array(
            $this->dtstamp_,
            $this->uid_,
            $this->class_,
            $this->completed_,
            $this->created_,
            $this->description_,
            $this->dtstart_,
            $this->geo_,
            $this->last_mod_,
            $this->location_,
            $this->organizer_,
            $this->percent_,
            $this->priority_,
            $this->recurid_,
            $this->seq_,
            $this->status_,
            $this->summary_,
            $this->url_,
            $this->rrule_
        );
        
        if (!is_null($this->due_)) {
            $res[] = $this->due_;
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
            $this->x_propList_,
            $this->iana_propList_
        );

        return $res;
    }

    public function toString()
    {
        $res = "BEGIN:VTODO\n";
        foreach ($this->getProperties() as $property) {
            if (!is_null($property)) {
                $res .= $property->toString();
            }
        }
        $res .= "END:VTODO\n";
        return $res;
    }

    public function &getUid()
    {
        return $this->uid_;
    }

    public function &setClassification(\Triedge\Calendar\Property\Classification $class)
    {
        $this->class_ = $class;
        return $this;
    }

    public function &setDateTimeCompleted(\Triedge\Calendar\Property\DateTimeCompleted $completed)
    {
        $this->completed_ = $completed;
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

    public function &setDateTimestart(\Triedge\Calendar\Property\DateTimeStart $dtStart)
    {
        $this->dtstart_ = $dtStart;
        return $this;
    }

    public function &setGeographicPosition(\Triedge\Calendar\Property\GeographicPosition& $geo)
    {
        $this->geo_ = $geo;
        return $this;
    }

    public function &setLastModified(\Triedge\Calendar\Property\LastModified $lastMod)
    {
        $this->last_mod_ = $lastMod;
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

    public function &setPercentComplete(\Triedge\Calendar\Property\PercentComplete $percent)
    {
        $this->percent_ = $percent;
        return $this;
    }

    public function &setPriority(\Triedge\Calendar\Property\Priority $priority)
    {
        $this->priority_ = $priority;
        return $this;
    }

    public function &setRecurrenceId(\Triedge\Calendar\Property\RecurrenceId $recurid)
    {
        $this->recurid_ = $recurid;
        return $this;
    }

    public function &setSequenceNumber(\Triedge\Calendar\Property\SequenceNumber $seq)
    {
        $this->seq_ = $seq;
        return $this;
    }

    public function &setStatus(\Triedge\Calendar\Property\ToDoStatus $status)
    {
        $this->status_ = $status;
        return $this;
    }
    
    public function &setSummary(\Triedge\Calendar\Property\Summary $summary)
    {
        $this->summary_ = $summary;
        return $this;
    }
    
    public function &setUrl(\Triedge\Calendar\Property\Url $url)
    {
        $this->url_ = $url;
        return $this;
    }

    public function &setRecurrenceRule(\Triedge\Calendar\Property\RecurrenceRule $rrule)
    {
        $this->rrule_ = $rrule;
        return $this;
    }

    public function &setDateTimeDue(\Triedge\Calendar\Property\DateTimeDue $due)
    {
        $this->due_ = $due;
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

    public function &addcontact(\Triedge\Calendar\Property\Contact $contact)
    {
        $this->contactList_[] = $contact;
        return $this;
    }
    
    public function &addExceptionDateTimes(\Triedge\Calendar\Property\ExceptionDateTimes $exdate)
    {
        $this->exdateList_[] = $exdate;
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
    public function &addRecurrenceDateTimes(\Triedge\Calendar\Property\RecurrenceDateTimes $rdate)
    {
        $this->rdateList_[] = $rdate;
        return $this;
    }
    
    //TODO
    // public $x_propList_ = array();
    // public $iana_propList_ = array();
}
