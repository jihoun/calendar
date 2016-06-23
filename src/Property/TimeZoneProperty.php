<?php
namespace Triedge\Calendar\Property;

class TimeZoneProperty
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    protected $dtstart_;
    protected $tzoffsetto_;
    protected $tzoffsetfrom_;
    // The following is OPTIONAL,
    // but SHOULD NOT occur more than once.
    protected $rrule_ = null;
    // The following are OPTIONAL,
    // and MAY occur more than once.
    protected $commentList_ = array();
    protected $rdateList_ = array();
    protected $tznameList_ = array();
    protected $x_propList_ = array();
    protected $iana_propList_ = array();

    public function __construct(\Triedge\Calendar\Property\DateTimeStart $dtstart)
    {
        $this->dtstart_ = $dtstart;
        $this->tzoffsetto_ = new \Triedge\Calendar\Property\TimezoneOffsetTo();
        $this->tzoffsetfrom_ = new \Triedge\Calendar\Property\TimezoneOffsetFrom();
    }

    private function getProperties()
    {
        $res = array(
            $this->dtstart_,
            $this->tzoffsetto_,
            $this->tzoffsetfrom_,
            $this->rrule_
        );
        $res = array_merge(
            $res,
            $this->commentList_,
            $this->rdateList_,
            $this->tznameList_,
            $this->x_propList_,
            $this->iana_propList_
        );
        return $res;
    }

    public function toString()
    {
        $res = '';
        foreach ($this->getProperties() as $property) {
            if (!is_null($property)) {
                $res .= $property->toString();
            }
        }
        return $res;
    }
}