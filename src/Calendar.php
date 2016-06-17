<?php
namespace Triedge\Calendar;

class Calendar
{
    public $prodid_ = '-//Triedge//EN';
    public $version_ = '2.0';
    public $calscale_ = 'GREGORIAN';
    public $method_ = null;
    
    private $componentList_ = array();

    public function addComponent(\Triedge\Calendar\Component\IComponent $component)
    {
        $this->componentsList_[] = $component;
    }

    public function toString()
    {
        $res = "BEGIN:VCALENDAR\n";
        $res .= 'VERSION:'.$this->version_."\n";
        $res .= 'PRODID:'.$this->prodid_."\n";
        if (!is_null($this->calscale_)) {
            $res .= 'CALSCALE:'.$this->calscale_."\n";
        }
        if (!is_null($this->method_)) {
            $res .= 'METHOD:'.$this->method_."\n";
        }
        foreach ($this->componentsList_ as $component) {
            $res .= $component->toString();
        }
        $res .= "END:VCALENDAR";

        return $res;
    }
}
