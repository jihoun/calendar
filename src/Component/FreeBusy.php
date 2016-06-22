<?php
namespace Triedge\Calendar\Component;

/**
 * Provide a grouping of component properties that describe either a request for free/busy time, describe a response to
 * a request for free/busy time, or describe a published set of busy time.
 */
class FreeBusy extends IComponent
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    public $dtstamp_;
    public $uid_;
    // The following are OPTIONAL,
    // but MUST NOT occur more than once.
    public $contact_ = null;
    public $dtstart_ = null;
    public $dtend_ = null;
    public $organizer_ = null;
    public $url_ = null;
    // The following are OPTIONAL,
    // and MAY occur more than once.
    public $attendeeList_ = array();
    public $commentList_ = array();
    public $freebusyList_ = array();
    public $rstatusList_ = array();
    public $x_propList_ = array();
    public $iana_propList_ = array();

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
            $this->contact_,
            $this->dtstart_,
            $this->dtend_,
            $this->organizer_,
            $this->url_,
        );
        $res = array_merge(
            $res,
            $this->attendeeList_,
            $this->commentList_,
            $this->freebusyList_,
            $this->rstatusList_,
            $this->x_propList_,
            $this->iana_propList_
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

    public function getUid()
    {
        return $this->uid_;
    }

    public function &setContact(\Triedge\Calendar\Property\Contact $contact)
    {
        $this->contact_ = $contact;
        return $this;
    }
    public function &setDateTimeStart(\Triedge\Calendar\Property\DateTimeStart $dtstart)
    {
        $this->dtstart_ = $dtstart;
        return $this;
    }
    public function &setDateTimeEnd(\Triedge\Calendar\Property\DateTimeEnd $dtend)
    {
        $this->dtend_ = $dtend;
        return $this;
    }
    public function &setOrganizer(\Triedge\Calendar\Property\Organizer $organizer)
    {
        $this->organizer_ = $organizer;
        return $this;
    }
    public function &setUrl(\Triedge\Calendar\Property\Url $url)
    {
        $this->url_ = $url;
        return $this;
    }

    public function &addAttendee(\Triedge\Calendar\Property\Attendee $attendee)
    {
        $this->attendeeList_[] = $attendee;
        return $this;
    }
    public function &addComment(\Triedge\Calendar\Property\Comment $comment)
    {
        $this->commentList_[] = $comment;
        return $this;
    }
    public function &addFreeBusy(\Triedge\Calendar\Property\FreeBusyTime $freeBusy)
    {
        $this->freebusyList_[] = $freeBusy;
        return $this;
    }
    public function &addRequestStatus(\Triedge\Calendar\Property\RequestStatus $rstatus)
    {
        $this->rstatusList_[] = $rstatus;
        return $this;
    }
    // public $x_propList_ = array();
    // public $iana_propList_ = array();
}
