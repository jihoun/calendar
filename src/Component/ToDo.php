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
        //TODO
        $res .= "END:VTODO\n";
        return $res;
    }
}