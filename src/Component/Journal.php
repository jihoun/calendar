<?php
namespace Triedge\Calendar\Component;

/**
 * Provide a grouping of component properties that describe a journal entry.
 */
class Journal extends IComponent
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    public $dtstamp_;
    public $uid_;
    // The following are OPTIONAL,
    // but MUST NOT occur more than once.
    public $class_ = null;
    public $created_ = null;
    public $dtstart_ = null;
    public $last_mod_ = null;
    public $organizer_ = null;
    public $recurid_ = null;
    public $seq_ = null;
    public $status_ = null;
    public $summary_ = null;
    public $url_ = null;
    // The following is OPTIONAL,
    // but SHOULD NOT occur more than once.
    public $rrule_ = null;
    // The following are OPTIONAL,
    // and MAY occur more than once.
    public $attachList_ = array();
    public $attendeeList_ = array();
    public $categoriesList_ = array();
    public $commentList_ = array();
    public $contactList_ = array();
    public $descriptionList_ = array();
    public $exdateList_ = array();
    public $relatedList_ = array();
    public $rdateList_ = array();
    public $rstatusList_ = array();
    public $x_propList_ = array();
    public $iana_propList_ = array();

    public function toString()
    {
        $res = "BEGIN:VJOURNAL\n";
        $res .= "UID:".$this->uid_."\n";
        //TODO
        foreach ($this->commentList_ as $comment) {
            $res .= $comment->toString();
        }
        //TODO
        foreach ($this->descriptionList_ as $description) {
            $res .= $description->toString();
        }
        //TODO
        $res .= "END:VJOURNAL\n";
        return $res;
    }

    public function &addComment(\Triedge\Calendar\Property\Comment $comment)
    {
        $this->commentList_[] = $comment;
        return $this;
    }

    public function &addDescription(\Triedge\Calendar\Property\Description $description)
    {
        $this->descriptionList_[] = $description;
        return $this;
    }
}
