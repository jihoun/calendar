<?php
namespace Jihoun\Calendar;

use Jihoun\Calendar\Property as Property;
use Jihoun\Calendar\Component as Component;

class Calendar
{
    protected $prodid;
    protected $version;
    public $calscale = null;
    public $method = null;
    
    private $componentList = array();

    /**
     * Calendar constructor.
     * @param string $company
     * @param string $product
     * @param string $lang
     */
    public function __construct($company = 'triedge', $product = 'calendar', $lang = 'en')
    {
        $this->prodid = new Property\ProductIdentifier($company, $product, $lang);
        $this->version = new Property\Version();
    }

    /**
     * @param Component\IComponent $component
     * @return $this
     */
    public function &addComponent(Component\IComponent $component)
    {
        $this->componentList[] = $component;
        return $this;
    }

    /**
     * @param Component\TimeZone $tz
     * @return $this
     */
    public function &addTimeZone(Component\TimeZone $tz)
    {
        $this->componentList[] = $tz;
        return $this;
    }

    /**
     * @return string
     */
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
