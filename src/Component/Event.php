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
    public $dtend_;
    public $duration_;

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
    public $resources_ = array();
    public $rdate_ = array();
    public $xProp_ = array();
    public $ianaProp_ = array();

    public function toString()
    {
        $res = "BEGIN:VEVENT\n";
        $res .= 'UID:'.$this->uid_."\n";
        $res .= 'DTSTAMP:'.$this->dtstamp_."\n";
        //TODO
        if (!is_null($this->class_)) {
            $res .= $this->class_->toString();
        }
        if (!is_null($this->created_)) {
            //TODO
        }
        if (!is_null($this->description_)) {
            $res .= $this->description_->toString();
        }
        if (!is_null($this->geo_)) {
            $res .= $this->geo_->toString();
        }
        if (!is_null($this->lastMod_)) {
            //TODO
        }
        if (!is_null($this->location_)) {
            $res .= $this->location_->toString();
        }
        if (!is_null($this->organizer_)) {
            //TODO
        }
        if (!is_null($this->priority_)) {
            $res .= $this->priority_->toString();
        }
        if (!is_null($this->seq_)) {
            //TODO
        }
        if (!is_null($this->status_)) {
            //TODO
        }
        if (!is_null($this->summary_)) {
            //TODO
        }
        if (!is_null($this->transp_)) {
            $res .= $this->transp_->toString();
        }
        if (!is_null($this->url_)) {
            //TODO
        }
        if (!is_null($this->recurid_)) {
            //TODO
        }
        foreach ($this->commentList_ as $comment) {
            $res .= $comment->toString();
        }
        //TODO
        $res .= "END:VEVENT\n";
        return $res;
    }

    public function &setClass(\Triedge\Calendar\Property\Classification $class)
    {
        $this->class_ = $class;
        return $this;
    }

    public function &setCreated(\Triedge\Calendar\Property\Created $created)
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
        //TODO
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

    public function &addComment(\Triedge\Calendar\Property\Comment $comment)
    {
        $this->commentList_[] = $comment;
        return $this;
    }
}
