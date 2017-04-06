<?php
namespace Jihoun\Calendar\Component;

use \Jihoun\Calendar\Property as Property;

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

    /**
     * FreeBusy constructor.
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

    /**
     * @return string
     */
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

    /**
     * @return \Jihoun\Calendar\Property\Uid
     */
    public function &getUid()
    {
        return $this->uid;
    }

    /**
     * @param \Jihoun\Calendar\Property\Contact $contact
     * @return $this
     */
    public function &setContact(Property\Contact $contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\DateTimeStart $dtstart
     * @return $this
     */
    public function &setDateTimeStart(Property\DateTimeStart $dtstart)
    {
        $this->dtstart = $dtstart;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\DateTimeEnd $dtend
     * @return $this
     */
    public function &setDateTimeEnd(Property\DateTimeEnd $dtend)
    {
        $this->dtend = $dtend;
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
     * @param \Jihoun\Calendar\Property\Url $url
     * @return $this
     */
    public function &setUrl(Property\Url $url)
    {
        $this->url = $url;
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
     * @param \Jihoun\Calendar\Property\Comment $comment
     * @return $this
     */
    public function &addComment(Property\Comment $comment)
    {
        $this->commentList[] = $comment;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\FreeBusyTime $freeBusy
     * @return $this
     */
    public function &addFreeBusy(Property\FreeBusyTime $freeBusy)
    {
        $this->freebusyList[] = $freeBusy;
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
