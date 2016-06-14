<?php
namespace Triedge\Calendar;

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
        $res .= "UID:".$this->uid_."\n";
        //TODO
        $res .= "END:VEVENT\n";
        return $res;
    }
}