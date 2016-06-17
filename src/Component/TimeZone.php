<?php
namespace Triedge\Calendar\Component;

/**
 * Provide a grouping of component properties that defines a time zone.
 */
class TimeZone extends IComponent
{
    // 'tzid' is REQUIRED, but MUST NOT occur more
    // than once.
    public $tzid_;
    // 'last-mod' and 'tzurl' are OPTIONAL,
    // but MUST NOT occur more than once.
    public $last_mod_ = null;
    public $tzurl_ = null;
    // One of 'standardc' or 'daylightc' MUST occur
    // and each MAY occur more than once.
    public $standardcList_ = array();
    public $daylightcList_ = array();
    // The following are OPTIONAL,
    // and MAY occur more than once.
    public $x_propList_ = array();
    public $iana_propList_ = array();

    public function toString()
    {
        $res = "BEGIN:VTIMEZONE\n";
        //TODO
        $res .= "END:VTIMEZONE\n";
        return $res;
    }
}
