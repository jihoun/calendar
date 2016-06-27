<?php
namespace Triedge\Calendar\Component;

use \Triedge\Calendar\Property as Property;

/**
 * Provide a grouping of component properties that describe a journal entry.
 */
class Journal extends IComponent
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    protected $dtstamp_;
    protected $uid_;
    // The following are OPTIONAL,
    // but MUST NOT occur more than once.
    protected $class_ = null;
    protected $created_ = null;
    protected $dtstart_ = null;
    protected $last_mod_ = null;
    protected $organizer_ = null;
    protected $recurid_ = null;
    protected $seq_ = null;
    protected $status_ = null;
    protected $summary_ = null;
    protected $url_ = null;
    // The following is OPTIONAL,
    // but SHOULD NOT occur more than once.
    protected $rrule_ = null;
    // The following are OPTIONAL,
    // and MAY occur more than once.
    protected $attachList_ = array();
    protected $attendeeList_ = array();
    protected $categoriesList_ = array();
    protected $commentList_ = array();
    protected $contactList_ = array();
    protected $descriptionList_ = array();
    protected $exdateList_ = array();
    protected $relatedList_ = array();
    protected $rdateList_ = array();
    protected $rstatusList_ = array();
    protected $x_propList_ = array();
    protected $iana_propList_ = array();

    public function __construct()
    {
        $this->dtstamp_ = new Property\DateTimeStamp();
        $this->uid_ = new Property\Uid();
    }

    private function getProperties()
    {
        $res = array(
            $this->dtstamp_,
            $this->uid_,
            $this->class_,
            $this->created_,
            $this->dtstart_,
            $this->last_mod_,
            $this->organizer_,
            $this->recurid_,
            $this->seq_,
            $this->status_,
            $this->summary_,
            $this->url_,
            $this->rrule_
        );
        $res = array_merge(
            $res,
            $this->attachList_,
            $this->attendeeList_,
            $this->categoriesList_,
            $this->commentList_,
            $this->contactList_,
            $this->descriptionList_,
            $this->exdateList_,
            $this->relatedList_,
            $this->rdateList_,
            $this->rstatusList_,
            $this->x_propList_,
            $this->iana_propList_
        );
        return $res;
    }

    public function toString()
    {
        $res = "BEGIN:VJOURNAL\n";
        foreach ($this->getProperties() as $property) {
            if (!is_null($property)) {
                $res .= $property->toString();
            }
        }
        $res .= "END:VJOURNAL\n";
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

    public function &setDateTimeCreated(\Triedge\Calendar\Property\DateTimeCreated $created)
    {
        $this->created_ = $created;
        return $this;
    }

    public function &setDateTimestart(\Triedge\Calendar\Property\DateTimeStart $dtStart)
    {
        $this->dtstart_ = $dtStart;
        return $this;
    }

    public function &setLastModified(\Triedge\Calendar\Property\LastModified $last_mod)
    {
        $this->last_mod_ = $last_mod;
        return $this;
    }

    public function &setOrganizer(\Triedge\Calendar\Property\Organizer $organizer)
    {
        $this->organizer_ = $organizer;
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

    public function &setStatus(\Triedge\Calendar\Property\JournalStatus $status)
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

    public function &addDescription(\Triedge\Calendar\Property\Description $description)
    {
        $this->descriptionList_[] = $description;
        return $this;
    }

    public function &addExceptionDateTimes(\Triedge\Calendar\Property\ExceptionDateTimes $exdate)
    {
        $this->exdateList_[] = $exdate;
        return $this;
    }

    public function &addRelatedTo(\Triedge\Calendar\Property\RelatedTo $related)
    {
        $this->relatedList_[] = $related;
        return $this;
    }

    public function &addRecurrenceDateTimes(\Triedge\Calendar\Property\RecurrenceDateTimes $rdate)
    {
        $this->rdateList_[] = $rdate;
        return $this;
    }

    public function &addRequestStatus(\Triedge\Calendar\Property\RequestStatus $rstatus)
    {
        $this->rstatusList_[] = $rstatus;
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
