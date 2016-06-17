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

    public function toString()
    {
        $res = "BEGIN:VFREEBUSY\n";
        $res .= "UID:".$this->uid_."\n";
        //TODO
        $res .= "END:VFREEBUSY\n";
        return $res;
    }
}
