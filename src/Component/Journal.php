<?php
namespace Jihoun\Calendar\Component;

use \Jihoun\Calendar\Property as Property;

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

    /**
     * Journal constructor.
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

    /**
     * @return string
     */
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

    /**
     * @return \Jihoun\Calendar\Property\Uid
     */
    public function &getUid()
    {
        return $this->uid;
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
     * @param \Jihoun\Calendar\Property\DateTimeStart $dtStart
     * @return $this
     */
    public function &setDateTimestart(Property\DateTimeStart $dtStart)
    {
        $this->dtstart = $dtStart;
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
     * @param \Jihoun\Calendar\Property\Organizer $organizer
     * @return $this
     */
    public function &setOrganizer(Property\Organizer $organizer)
    {
        $this->organizer = $organizer;
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
     * @param \Jihoun\Calendar\Property\SequenceNumber $seq
     * @return $this
     */
    public function &setSequenceNumber(Property\SequenceNumber $seq)
    {
        $this->seq = $seq;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\JournalStatus $status
     * @return $this
     */
    public function &setStatus(Property\JournalStatus $status)
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
     * @param \Jihoun\Calendar\Property\Url $url
     * @return $this
     */
    public function &setUrl(Property\Url $url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\RecurrenceRule $rrule
     * @return $this
     */
    public function &setRecurrenceRule(Property\RecurrenceRule $rrule)
    {
        $this->rrule = $rrule;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Attachment $attach
     * @return $this
     */
    public function &addAttachment(Property\Attachment $attach)
    {
        $this->attachList[] = $attach;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Attendee $attendee
     * @return $this
     */
    public function &addAttendee(Property\Attendee $attendee)
    {
        $this->attendeeList[] = $attendee;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Categories $categories
     * @return $this
     */
    public function &addCategories(Property\Categories $categories)
    {
        $this->categoriesList[] = $categories;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Comment $comment
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
     * @param \Jihoun\Calendar\Property\Description $description
     * @return $this
     */
    public function &addDescription(Property\Description $description)
    {
        $this->descriptionList[] = $description;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\ExceptionDateTimes $exdate
     * @return $this
     */
    public function &addExceptionDateTimes(Property\ExceptionDateTimes $exdate)
    {
        $this->exdateList[] = $exdate;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\RelatedTo $related
     * @return $this
     */
    public function &addRelatedTo(Property\RelatedTo $related)
    {
        $this->relatedList[] = $related;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\RecurrenceDateTimes $rdate
     * @return $this
     */
    public function &addRecurrenceDateTimes(Property\RecurrenceDateTimes $rdate)
    {
        $this->rdateList[] = $rdate;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\RequestStatus $rstatus
     * @return $this
     */
    public function &addRequestStatus(Property\RequestStatus $rstatus)
    {
        $this->rstatusList[] = $rstatus;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\XProperty $xProp
     * @return $this
     */
    public function &addXProperty(Property\XProperty $xProp)
    {
        $this->xPropList[] = $xProp;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\IanaProperty $ianaProp
     * @return $this
     */
    public function &addIanaProperty(Property\IanaProperty $ianaProp)
    {
        $this->ianaPropList[] = $ianaProp;
        return $this;
    }
}
