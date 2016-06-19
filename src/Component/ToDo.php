<?php
namespace Triedge\Calendar\Component;

/**
 * Provide a grouping of calendar properties that describe a to-do.
 */
class ToDo extends IComponent
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    public $dtstamp_;
    public $uid_;
    // The following are OPTIONAL,
    // but MUST NOT occur more than once.
    public $class_ = null;
    public $completed_ = null;
    public $created_ = null;
    public $description_ = null;
    public $dtstart_ = null;
    public $geo_ = null;
    public $last_mod_ = null;
    public $location_ = null;
    public $organizer_ = null;
    public $percent_ = null;
    public $priority_ = null;
    public $recurid_ = null;
    public $seq_ = null;
    public $status_ = null;
    public $summary_ = null;
    public $url_ = null;
    // The following is OPTIONAL,
    // but SHOULD NOT occur more than once.
    public $rrule_ = null;
    // Either 'due' or 'duration' MAY appear in
    // a 'todoprop', but 'due' and 'duration'
    // MUST NOT occur in the same 'todoprop'.
    // If 'duration' appear in a 'todoprop',
    // then 'dtstart' MUST also appear in
    // the same 'todoprop'.
    public $due_;
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
    public $resourcesList_ = array();
    public $rdateList_ = array();
    public $x_propList_ = array();
    public $iana_propList_ = array();

    public function toString()
    {
        $res = "BEGIN:VTODO\n";
        $res .= "UID:".$this->uid_."\n";
        if (!is_null($this->class_)) {
            //TODO
        }
        if (!is_null($this->completed_)) {
            //TODO
        }
        if (!is_null($this->created_)) {
            //TODO
        }
        if (!is_null($this->description_)) {
            $res .= $this->description_->toString();
        }
        if (!is_null($this->dtstart_)) {
            //TODO
        }
        if (!is_null($this->geo_)) {
            $res .= $this->geo_->toString();
        }
        if (!is_null($this->last_mod_)) {
            //TODO
        }
        if (!is_null($this->location_)) {
            //TODO
        }
        if (!is_null($this->organizer_)) {
            //TODO
        }
        if (!is_null($this->percent_)) {
            $res .= $this->percent_->toString();
        }
        if (!is_null($this->priority_)) {
            $res .= $this->priority_->toString();
        }
        if (!is_null($this->recurid_)) {
            //TODO
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
        if (!is_null($this->url_)) {
            //TODO
        }

        //TODO
        foreach ($this->commentList_ as $comment) {
            $res .= $comment->toString();
        }
        //TODO
        $res .= "END:VTODO\n";
        return $res;
    }

    public function &setClassification(\Triedge\Calendar\Property\Classification $class)
    {
        $this->class_ = $class;
        return $this;
    }

    public function &setCompleted(\Triedge\Calendar\Property\Completed $completed)
    {
        $this->completed_ = $completed;
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

    public function &setDtstart(\Triedge\Calendar\Property\DtStart $dtStart)
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
        $this->recurid_ = $recurid_;
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
    
    public function &setUrl(\Triedge\Calendar\Property\Url $url)
    {
        $this->url_ = $url;
        return $this;
    }

    public function &addComment(\Triedge\Calendar\Property\Comment $comment)
    {
        $this->commentList_[] = $comment;
        return $this;
    }
}
