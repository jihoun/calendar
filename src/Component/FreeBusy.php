<?php
namespace Jihoun\Calendar\Component;

/**
 * Provide a grouping of component properties that describe either a request for free/busy time, describe a response to
 * a request for free/busy time, or describe a published set of busy time.
 */
class FreeBusy extends IComponent
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    protected $dtstamp;
    protected $uid;
    // The following are OPTIONAL,
    // but MUST NOT occur more than once.
    protected $contact = null;
    protected $dtstart = null;
    protected $dtend = null;
    protected $organizer = null;
    protected $url = null;
    // The following are OPTIONAL,
    // and MAY occur more than once.
    protected $attendeeList = array();
    protected $commentList = array();
    protected $freebusyList = array();
    protected $rstatusList = array();
    protected $xPropList = array();
    protected $ianaPropList = array();

    public function __construct()
    {
        $this->dtstamp = new \Jihoun\Calendar\Property\DateTimeStamp();
        $this->uid = new \Jihoun\Calendar\Property\Uid();
    }

    private function getProperties()
    {
        $res = array(
            $this->dtstamp,
            $this->uid,
            $this->contact,
            $this->dtstart,
            $this->dtend,
            $this->organizer,
            $this->url,
        );
        $res = array_merge(
            $res,
            $this->attendeeList,
            $this->commentList,
            $this->freebusyList,
            $this->rstatusList,
            $this->xPropList,
            $this->ianaPropList
        );
        return $res;
    }

    public function toString()
    {
        $res = "BEGIN:VFREEBUSY\n";
        foreach ($this->getProperties() as $property) {
            if (!is_null($property)) {
                $res .= $property->toString();
            }
        }
        $res .= "END:VFREEBUSY\n";
        return $res;
    }

    public function &getUid()
    {
        return $this->uid;
    }

    public function &setContact(\Jihoun\Calendar\Property\Contact $contact)
    {
        $this->contact = $contact;
        return $this;
    }
    public function &setDateTimeStart(\Jihoun\Calendar\Property\DateTimeStart $dtstart)
    {
        $this->dtstart = $dtstart;
        return $this;
    }
    public function &setDateTimeEnd(\Jihoun\Calendar\Property\DateTimeEnd $dtend)
    {
        $this->dtend = $dtend;
        return $this;
    }
    public function &setOrganizer(\Jihoun\Calendar\Property\Organizer $organizer)
    {
        $this->organizer = $organizer;
        return $this;
    }
    public function &setUrl(\Jihoun\Calendar\Property\Url $url)
    {
        $this->url = $url;
        return $this;
    }

    public function &addAttendee(\Jihoun\Calendar\Property\Attendee $attendee)
    {
        $this->attendeeList[] = $attendee;
        return $this;
    }
    public function &addComment(\Jihoun\Calendar\Property\Comment $comment)
    {
        $this->commentList[] = $comment;
        return $this;
    }
    public function &addFreeBusy(\Jihoun\Calendar\Property\FreeBusyTime $freeBusy)
    {
        $this->freebusyList[] = $freeBusy;
        return $this;
    }
    public function &addRequestStatus(\Jihoun\Calendar\Property\RequestStatus $rstatus)
    {
        $this->rstatusList[] = $rstatus;
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
