<?php
namespace Triedge\Calendar\Component;

/**
 * Provide a grouping of component properties that describe an event.
 */
class Event extends IComponent
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    public $dtstamp_;
    public $uid_;

    // The following is REQUIRED if the component
    // appears in an iCalendar object that doesn't
    // specify the "METHOD" property; otherwise, it
    // is OPTIONAL; in any case, it MUST NOT occur
    // more than once.
    public $dtstart_;

    // The following are OPTIONAL,
    // but MUST NOT occur more than once.
    public $class_ = null;
    public $created_ = null;
    public $description_ = null;
    public $geo_ = null;
    public $lastMod_ = null;
    public $location_ = null;
    public $organizer_ = null;
    public $priority_ = null;
    public $seq_ = null;
    public $status_ = null;
    public $summary_ = null;
    public $transp_ = null;
    public $url_ = null;
    public $recurid_ = null;

    // The following is OPTIONAL,
    // but SHOULD NOT occur more than once.
    public $rrule_ = null;

    // Either 'dtend' or 'duration' MAY appear in
    // a 'eventprop', but 'dtend' and 'duration'
    // MUST NOT occur in the same 'eventprop'.
    public $dtend_ = null;
    public $duration_ = null;

    // The following are OPTIONAL,
    // and MAY occur more than once.
    public $attachList_ = array();
    public $attendeeList_ = array();
    public $categoriesList_ = array();
    public $commentList_ = array();
    public $contactList_ = array();
    public $exdateList_ = array();
    public $rstatusList_ = array();
    public $relatedList_ = array();
    public $resourcesList_ = array();
    public $rdateList_ = array();
    public $xPropList_ = array();
    public $ianaPropList_ = array();

    public function __construct()
    {
        $this->dtstamp_ = new \Triedge\Calendar\Property\DateTimeStamp();
        $this->uid_ = new \Triedge\Calendar\Property\Uid();
    }

    public function toString()
    {
        $res = "BEGIN:VEVENT\n";
        $res .= $this->uid_->toString();
        $res .= $this->dtstamp_->toString();
        
        if (!is_null($this->dtstart_)) {
            $res .= $this->dtstart_->toString();
        }

        if (!is_null($this->class_)) {
            $res .= $this->class_->toString();
        }
        if (!is_null($this->created_)) {
            $this->created_->toString();
        }
        if (!is_null($this->description_)) {
            $res .= $this->description_->toString();
        }
        if (!is_null($this->geo_)) {
            $res .= $this->geo_->toString();
        }
        if (!is_null($this->lastMod_)) {
            $res .= $this->lastMod_->toString();
        }
        if (!is_null($this->location_)) {
            $res .= $this->location_->toString();
        }
        if (!is_null($this->organizer_)) {
            $res .= $this->organizer_->toString();
        }
        if (!is_null($this->priority_)) {
            $res .= $this->priority_->toString();
        }
        if (!is_null($this->seq_)) {
            $res .= $this->seq_->toString();
        }
        if (!is_null($this->status_)) {
            $res .= $this->status_->toString();
        }
        if (!is_null($this->summary_)) {
            $res .= $this->summary_->toString();
        }
        if (!is_null($this->transp_)) {
            $res .= $this->transp_->toString();
        }
        if (!is_null($this->url_)) {
            $res .= $this->url_->toString();
        }
        if (!is_null($this->recurid_)) {
            $res .= $this->recurid_->toString();
        }
        
        if (!is_null($this->rrule_)) {
            $res .= $this->rrule_->toString();
        }
        
        if (!is_null($this->dtend_)) {
            $res .= $this->dtend_->toString();
        } elseif (!is_null($this->duration_)) {
            $res .= $this->duration_->toString();
        }

        foreach ($this->attachList_ as $attach) {
            $res .= $attach->toString();
        }
        foreach ($this->attendeeList_ as $attendee) {
            $res .= $attendee->toString();
        }
        foreach ($this->categoriesList_ as $categorie) {
            $res .= $categorie->toString();
        }
        foreach ($this->commentList_ as $comment) {
            $res .= $comment->toString();
        }
        foreach ($this->contactList_ as $contact) {
            $res .= $contact->toString();
        }
        foreach ($this->exdateList_ as $exDate) {
            $res .= $exDate->toString();
        }
        foreach ($this->rstatusList_ as $rstatus) {
            $res .= $rstatus->toString();
        }
        foreach ($this->relatedList_ as $related) {
            $res .= $related->toString();
        }
        foreach ($this->resourcesList_ as $resources) {
            $res .= $resources->toString();
        }
        foreach ($this->rdateList_ as $rDate) {
            $res .= $rDate->toString();
        }
        foreach ($this->xPropList_ as $xProp) {
            $res .= $xProp->toString();
        }
        foreach ($this->ianaPropList_ as $ianaList) {
            $res .= $ianaList->toString();
        }
        $res .= "END:VEVENT\n";
        return $res;
    }

    public function getUid()
    {
        return $this->uid_;
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
    
    public function &setStatus(\Triedge\Calendar\Property\Status $status)
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

    //TODO
    // public $rrule_ = null;

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
    
    // public function &addXProp(\Triedge\Calendar\Property\ $)
    // {
    //     $this->[] = $;
    //     return $this;
    // }
    
    // public function &addIanaProp(\Triedge\Calendar\Property\ $)
    // {
    //     $this->[] = $;
    //     return $this;
    // }
}
