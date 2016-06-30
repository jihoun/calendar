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
    protected $dtstamp;
    protected $uid;
    // The following are OPTIONAL,
    // but MUST NOT occur more than once.
    protected $class = null;
    protected $created = null;
    protected $dtstart = null;
    protected $lastMod = null;
    protected $organizer = null;
    protected $recurid = null;
    protected $seq = null;
    protected $status = null;
    protected $summary = null;
    protected $url = null;
    // The following is OPTIONAL,
    // but SHOULD NOT occur more than once.
    protected $rrule = null;
    // The following are OPTIONAL,
    // and MAY occur more than once.
    protected $attachList = array();
    protected $attendeeList = array();
    protected $categoriesList = array();
    protected $commentList = array();
    protected $contactList = array();
    protected $descriptionList = array();
    protected $exdateList = array();
    protected $relatedList = array();
    protected $rdateList = array();
    protected $rstatusList = array();
    protected $xPropList = array();
    protected $ianaPropList = array();

    public function __construct()
    {
        $this->dtstamp = new Property\DateTimeStamp();
        $this->uid = new Property\Uid();
    }

    private function getProperties()
    {
        $res = array(
            $this->dtstamp,
            $this->uid,
            $this->class,
            $this->created,
            $this->dtstart,
            $this->lastMod,
            $this->organizer,
            $this->recurid,
            $this->seq,
            $this->status,
            $this->summary,
            $this->url,
            $this->rrule
        );
        $res = array_merge(
            $res,
            $this->attachList,
            $this->attendeeList,
            $this->categoriesList,
            $this->commentList,
            $this->contactList,
            $this->descriptionList,
            $this->exdateList,
            $this->relatedList,
            $this->rdateList,
            $this->rstatusList,
            $this->xPropList,
            $this->ianaPropList
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
        return $this->uid;
    }

    public function &setClassification(\Triedge\Calendar\Property\Classification $class)
    {
        $this->class = $class;
        return $this;
    }

    public function &setDateTimeCreated(\Triedge\Calendar\Property\DateTimeCreated $created)
    {
        $this->created = $created;
        return $this;
    }

    public function &setDateTimestart(\Triedge\Calendar\Property\DateTimeStart $dtStart)
    {
        $this->dtstart = $dtStart;
        return $this;
    }

    public function &setLastModified(\Triedge\Calendar\Property\LastModified $lastMod)
    {
        $this->lastMod = $lastMod;
        return $this;
    }

    public function &setOrganizer(\Triedge\Calendar\Property\Organizer $organizer)
    {
        $this->organizer = $organizer;
        return $this;
    }

    public function &setRecurrenceId(\Triedge\Calendar\Property\RecurrenceId $recurid)
    {
        $this->recurid = $recurid;
        return $this;
    }

    public function &setSequenceNumber(\Triedge\Calendar\Property\SequenceNumber $seq)
    {
        $this->seq = $seq;
        return $this;
    }

    public function &setStatus(\Triedge\Calendar\Property\JournalStatus $status)
    {
        $this->status = $status;
        return $this;
    }

    public function &setSummary(\Triedge\Calendar\Property\Summary $summary)
    {
        $this->summary = $summary;
        return $this;
    }

    public function &setUrl(\Triedge\Calendar\Property\Url $url)
    {
        $this->url = $url;
        return $this;
    }

    public function &setRecurrenceRule(\Triedge\Calendar\Property\RecurrenceRule $rrule)
    {
        $this->rrule = $rrule;
        return $this;
    }

    public function &addAttachment(\Triedge\Calendar\Property\Attachment $attach)
    {
        $this->attachList[] = $attach;
        return $this;
    }
    
    public function &addAttendee(\Triedge\Calendar\Property\Attendee $attendee)
    {
        $this->attendeeList[] = $attendee;
        return $this;
    }

    public function &addCategories(\Triedge\Calendar\Property\Categories $categories)
    {
        $this->categoriesList[] = $categories;
        return $this;
    }
    
    public function &addComment(\Triedge\Calendar\Property\Comment $comment)
    {
        $this->commentList[] = $comment;
        return $this;
    }

    public function &addContact(\Triedge\Calendar\Property\Contact $contact)
    {
        $this->contactList[] = $contact;
        return $this;
    }

    public function &addDescription(\Triedge\Calendar\Property\Description $description)
    {
        $this->descriptionList[] = $description;
        return $this;
    }

    public function &addExceptionDateTimes(\Triedge\Calendar\Property\ExceptionDateTimes $exdate)
    {
        $this->exdateList[] = $exdate;
        return $this;
    }

    public function &addRelatedTo(\Triedge\Calendar\Property\RelatedTo $related)
    {
        $this->relatedList[] = $related;
        return $this;
    }

    public function &addRecurrenceDateTimes(\Triedge\Calendar\Property\RecurrenceDateTimes $rdate)
    {
        $this->rdateList[] = $rdate;
        return $this;
    }

    public function &addRequestStatus(\Triedge\Calendar\Property\RequestStatus $rstatus)
    {
        $this->rstatusList[] = $rstatus;
        return $this;
    }

    public function &addXProperty(\Triedge\Calendar\Property\XProperty $xProp)
    {
        $this->xPropList[] = $xProp;
        return $this;
    }
 
    public function &addIanaProperty(\Triedge\Calendar\Property\IanaProperty $ianaProp)
    {
        $this->ianaPropList[] = $ianaProp;
        return $this;
    }
}
