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
    protected $attendeeList = [];
    protected $commentList = [];
    protected $freebusyList = [];
    protected $rstatusList = [];
    protected $xPropList = [];
    protected $ianaPropList = [];

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
    private function getProperties(): array
    {
        $res = [
            $this->dtstamp,
            $this->uid,
            $this->contact,
            $this->dtstart,
            $this->dtend,
            $this->organizer,
            $this->url,
        ];
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
    public function toString(): string
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
    public function &getUid(): Property\Uid
    {
        return $this->uid;
    }

    /**
     * @param \Jihoun\Calendar\Property\Contact $contact
     * @return $this
     */
    public function &setContact(Property\Contact $contact): FreeBusy
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\DateTimeStart $dtstart
     * @return $this
     */
    public function &setDateTimeStart(Property\DateTimeStart $dtstart): FreeBusy
    {
        $this->dtstart = $dtstart;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\DateTimeEnd $dtend
     * @return $this
     */
    public function &setDateTimeEnd(Property\DateTimeEnd $dtend): FreeBusy
    {
        $this->dtend = $dtend;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Organizer $organizer
     * @return $this
     */
    public function &setOrganizer(Property\Organizer $organizer): FreeBusy
    {
        $this->organizer = $organizer;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Url $url
     * @return $this
     */
    public function &setUrl(Property\Url $url): FreeBusy
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Attendee $attendee
     * @return $this
     */
    public function &addAttendee(Property\Attendee $attendee): FreeBusy
    {
        $this->attendeeList[] = $attendee;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\Comment $comment
     * @return $this
     */
    public function &addComment(Property\Comment $comment): FreeBusy
    {
        $this->commentList[] = $comment;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\FreeBusyTime $freeBusy
     * @return $this
     */
    public function &addFreeBusy(Property\FreeBusyTime $freeBusy): FreeBusy
    {
        $this->freebusyList[] = $freeBusy;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\RequestStatus $rstatus
     * @return $this
     */
    public function &addRequestStatus(Property\RequestStatus $rstatus): FreeBusy
    {
        $this->rstatusList[] = $rstatus;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\XProperty $xProp
     * @return $this
     */
    public function &addXProperty(Property\XProperty $xProp): FreeBusy
    {
        $this->xPropList[] = $xProp;
        return $this;
    }

    /**
     * @param \Jihoun\Calendar\Property\IanaProperty $ianaProp
     * @return $this
     */
    public function &addIanaProperty(Property\IanaProperty $ianaProp): FreeBusy
    {
        $this->ianaPropList[] = $ianaProp;
        return $this;
    }
}
