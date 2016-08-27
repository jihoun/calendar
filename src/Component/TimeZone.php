<?php
namespace Jihoun\Calendar\Component;

/**
 * Provide a grouping of component properties that defines a time zone.
 */
class TimeZone
{
    // 'tzid' is REQUIRED, but MUST NOT occur more
    // than once.
    protected $tzid;
    // 'last-mod' and 'tzurl' are OPTIONAL,
    // but MUST NOT occur more than once.
    protected $lastMod = null;
    protected $tzurl = null;
    // One of 'standardc' or 'daylightc' MUST occur
    // and each MAY occur more than once.
    protected $standardcList = array();
    protected $daylightcList = array();
    // The following are OPTIONAL,
    // and MAY occur more than once.
    protected $xPropList = array();
    protected $ianaPropList = array();

    public function __construct()
    {
        $this->tzid = new \Jihoun\Calendar\Parameter\TimeZoneIdentifier();
    }

    public function toString()
    {
        if (empty($this->standardcList) && empty($this->daylightcList)) {
            return '';
        }

        $res = "BEGIN:VTIMEZONE\n";
        $res .= $this->tzid->toString();
        if (!is_null($this->lastMod)) {
            $res .= $this->lastMod->toString();
        }
        if (!is_null($this->tzurl)) {
            $res .= $this->tzurl->toString();
        }
        foreach ($this->standardcList as $standardc) {
            $res .= "BEGIN:STANDARD\n";
            $res .= $standardc->toString();
            $res .= "END:STANDARD\n";
        }
        foreach ($this->daylightcList as $daylightc) {
            $res .= "BEGIN:DAYLIGHT\n";
            $res .= $daylightc->toString();
            $res .= "END:DAYLIGHT\n";
        }
        $res .= "END:VTIMEZONE\n";
        return $res;
    }

    public function &setLastModified(\Jihoun\Calendar\Property\LastModified $lastMod)
    {
        $this->lastMod = $lastMod;
        return $this;
    }

    public function &setTimeZoneUrl(\Jihoun\Calendar\Property\TimeZoneUrl $tzurl)
    {
        $this->tzurl = $tzurl;
        return $this;
    }

    public function addStandardc(\Jihoun\Calendar\Property\TimeZoneProperty $tzprop)
    {
        $this->standardcList[] = $tzprop;
        return $this;
    }

    public function &addDaylightc(\Jihoun\Calendar\Property\TimeZoneProperty $tzprop)
    {
        $this->daylightcList[] = $tzprop;
        return $this;
    }

    public function &addXProperty(\Jihoun\Calendar\Property\XProperty $xProp)
    {
        $this->xPropList[] = $xProp;
        return $this;
    }
    public function &addIanaProperty(\Jihoun\Calendar\Property\IanaProperty $ianaProp)
    {
        $this->ianaPropList[] = $ianaProp;
        return $this;
    }
}
