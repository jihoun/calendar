<?php
namespace Jihoun\Calendar;

class Calendar
{
    protected $prodid;
    protected $version;
    public $calscale = null;
    public $method = null;
    
    private $componentList = array();

    public function __construct($company = 'triedge', $product = 'calendar', $lang = 'en')
    {
        $this->prodid = new \Jihoun\Calendar\Property\ProductIdentifier($company, $product, $lang);
        $this->version = new \Jihoun\Calendar\Property\Version();
    }

    public function &addComponent(\Jihoun\Calendar\Component\IComponent $component)
    {
        $this->componentList[] = $component;
        return $this;
    }

    public function &addTimeZone(\Jihoun\Calendar\Component\TimeZone $tz)
    {
        $this->componentList[] = $tz;
        return $this;
    }

    public function toString()
    {
        $res = "BEGIN:VCALENDAR\n";
        $res .= $this->version->toString();
        $res .= $this->prodid->toString();
        if (!is_null($this->calscale)) {
            $res .= $this->calscale->toString();
        }
        if (!is_null($this->method)) {
            $res .= 'METHOD:'.$this->method."\n";
        }
        foreach ($this->componentList as $component) {
            $res .= $component->toString();
        }
        $res .= "END:VCALENDAR";

        return $res;
    }
}
