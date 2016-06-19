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
        //TODO
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
        
        //TODO
        
        if (!is_null($this->dtend_)) {
            $res .= $this->dtend_->toString();
        } elseif (!is_null($this->duration_)) {
            $res .= $this->duration_->toString();
        }

        foreach($this->attachList_ as $attach) {
            $res .= $attach->toString();
        }
        foreach($this->attendeeList_ as $attendee) {
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
            $rs .= $exDate->toString();
        }
        foreach ($this->rstatusList_ as $rstatus) {
            $rs .= $rstatus->toString();
        }
        foreach ($this->relatedList_ as $related) {
            $rs .= $related->toString();
        }
        foreach ($this->resourcesList_ as $resources) {
            $rs .= $resources->toString();
        }
        foreach ($this->rdateList_ as $rDate) {
            $rs .= $rDate->toString();
        }
        foreach ($this->xPropList_ as $xProp) {
            $rs .= $xProp->toString();
        }
        foreach ($this->ianaPropList_ as $ianaList) {
            $rs .= $ianaList->toString();
        }
        $res .= "END:VEVENT\n";
        return $res;
    }

    public function &setClass(\Triedge\Calendar\Property\Classification $class)
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
        //TODO
        return $this;
    }

    public function &setPriority(\Triedge\Calendar\Property\Priority $priority)
    {
        $this->priority_ = $priority;
        return $this;
    }

    public function &setSeq(\Triedge\Calendar\Property\SequenceNumber $seq)
    {
        //TODO
        return $this;
    }
    
    public function &setStatus(\Triedge\Calendar\Property\Status $status)
    {
        //TODO
        return $this;
    }
    
    public function &setSummary(\Triedge\Calendar\Property\Summary $summary)
    {
        //TODO
        return $this;
    }

    public function &setTimeTransparency(\Triedge\Calendar\Property\TimeTransparency $transp)
    {
        $this->transp_ = $transp;
        return $this;
    }
    
    public function &setUrl(\Triedge\Calendar\Property\Url $url)
    {
        //TODO
        return $this;
    }
    
    public function &setRecurid(\Triedge\Calendar\Property\RecurrenceId $recurrenceId)
    {
        //TODO
        return $this;
    }

    //TODO

    //TODO

    public function &addComment(\Triedge\Calendar\Property\Comment $comment)
    {
        $this->commentList_[] = $comment;
        return $this;
    }
}
