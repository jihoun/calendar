<?php
namespace Triedge\Calendar\Component;

/**
 * Provide a grouping of component properties that defines a time zone.
 */
class TimeZone
{
    // 'tzid' is REQUIRED, but MUST NOT occur more
    // than once.
    protected $tzid_;
    // 'last-mod' and 'tzurl' are OPTIONAL,
    // but MUST NOT occur more than once.
    protected $last_mod_ = null;
    protected $tzurl_ = null;
    // One of 'standardc' or 'daylightc' MUST occur
    // and each MAY occur more than once.
    protected $standardcList_ = array();
    protected $daylightcList_ = array();
    // The following are OPTIONAL,
    // and MAY occur more than once.
    protected $x_propList_ = array();
    protected $iana_propList_ = array();

    public function __construct()
    {
        $this->tzid_ = new \Triedge\Calendar\Parameter\TimeZoneIdentifier();
    }

    public function toString()
    {
        if (empty($this->standardcList_) && empty($this->daylightcList_)) {
            return '';
        }

        $res = "BEGIN:VTIMEZONE\n";
        $res .= $this->tzid_->toString();
        if (!is_null($this->last_mod_)) {
            $res .= $this->last_mod_->toString();
        }
        if (!is_null($this->tzurl_)) {
            $res .= $this->tzurl_->toString();
        }
        foreach ($this->standardcList_ as $standardc) {
            $res .= "BEGIN:STANDARD\n";
            $res .= $standardc->toString();
            $res .= "END:STANDARD\n";
        }
        foreach ($this->daylightcList_ as $daylightc) {
            $res .= "BEGIN:DAYLIGHT\n";
            $res .= $daylightc->toString();
            $res .= "END:DAYLIGHT\n";
        }
        $res .= "END:VTIMEZONE\n";
        return $res;
    }

    public function &setLastModified(\Triedge\Calendar\Property\LastModified $last_mod)
    {
        $this->last_mod_ = $last_mod;
        return $this;
    }

    public function &setTimeZoneUrl(\Triedge\Calendar\Property\TimeZoneUrl $tzurl)
    {
        $this->tzurl_ = $tzurl;
        return $this;
    }

    public function addStandardc(\Triedge\Calendar\Property\TimeZoneProperty $tzprop)
    {
        $this->standardcList_[] = $tzprop;
        return $this;
    }

    public function &addDaylightc(\Triedge\Calendar\Property\TimeZoneProperty $tzprop)
    {
        $this->daylightcList_[] = $tzprop;
        return $this;
    }

    public function &addXProperty(\Triedge\Calendar\Property\XProperty $xProp)
    {
        $this->x_propList_[] = $xProp;
        return $this;
    }
    public function &addIanaProperty(\Triedge\Calendar\Property\IanaProperty $ianaProp)
    {
        $this->iana_propList_[] = $ianaProp;
        return $this;
    }
}
