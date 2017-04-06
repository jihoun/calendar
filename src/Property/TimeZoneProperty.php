<?php
namespace Jihoun\Calendar\Property;

/**
 * Class TimeZoneProperty
 * @package Jihoun\Calendar\Property
 */
class TimeZoneProperty
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    protected $dtstart;
    protected $tzoffsetto;
    protected $tzoffsetfrom;
    // The following is OPTIONAL,
    // but SHOULD NOT occur more than once.
    protected $rrule = null;
    // The following are OPTIONAL,
    // and MAY occur more than once.
    protected $commentList = array();
    protected $rdateList = array();
    protected $tznameList = array();
    protected $xPropList = array();
    protected $ianaPropList = array();

    /**
     * TimeZoneProperty constructor.
     * @param DateTimeStart $dtstart
     */
    public function __construct(DateTimeStart $dtstart)
    {
        $this->dtstart = $dtstart;
        $this->tzoffsetto = new TimeZoneOffsetTo();
        $this->tzoffsetfrom = new TimeZoneOffsetFrom();
    }

    /**
     * @return IProperty[]
     */
    private function getProperties()
    {
        $res = array(
            $this->dtstart,
            $this->tzoffsetto,
            $this->tzoffsetfrom,
            $this->rrule
        );
        $res = array_merge(
            $res,
            $this->commentList,
            $this->rdateList,
            $this->tznameList,
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
        $res = '';
        foreach ($this->getProperties() as $property) {
            if (!is_null($property)) {
                $res .= $property->toString();
            }
        }
        return $res;
    }
}
