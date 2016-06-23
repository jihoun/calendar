<?php
namespace Triedge\Calendar;

class Calendar
{
    protected $prodid_;
    protected $version_;
    public $calscale_ = null;
    public $method_ = null;
    
    private $componentList_ = array();

    public function __construct()
    {
        $this->prodid_ = new \Triedge\Calendar\Property\ProductIdentifier();
        $this->version_ = new \Triedge\Calendar\Property\Version();
    }

    public function &addComponent(\Triedge\Calendar\Component\IComponent $component)
    {
        $this->componentList_[] = $component;
        return $this;
    }

    public function &addTimeZone(\Triedge\Calendar\Component\TimeZone $tz)
    {
        $this->componentList_[] = $tz;
        return $this;
    }

    public function toString()
    {
        $res = "BEGIN:VCALENDAR\n";
        $res .= $this->version_->toString();
        $res .= $this->prodid_->toString();
        if (!is_null($this->calscale_)) {
            $res .= $this->calscale_->toString();
        }
        if (!is_null($this->method_)) {
            $res .= 'METHOD:'.$this->method_."\n";
        }
        foreach ($this->componentList_ as $component) {
            $res .= $component->toString();
        }
        $res .= "END:VCALENDAR";

        return $res;
    }
}
