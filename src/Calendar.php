<?php
namespace Triedge\Calendar;

class Calendar
{
    public $prodid_;
    public $version_ = '2.0';
    public $calscale_ = null;
    public $method_ = null;
    
    private $componentsList_ = array();

    public function addComponent(\Triedge\Calendar\IComponent $component)
    {
        $this->componentsList_[] = $component;
    }

    public function toString()
    {
        $res = "BEGIN:VCALENDAR\n";
        $res .= "VERSION:".$this->version_."\n";
        //TODO
        foreach ($this->componentsList_ as $component) {
            $res .= $component->toString();
        }
        $res .= "END:VCALENDAR";

        return $res;
    }
}
