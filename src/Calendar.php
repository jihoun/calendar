<?php
namespace Jihoun\Calendar;

use Jihoun\Calendar\Property as Property;
use Jihoun\Calendar\Component as Component;

class Calendar
{
    /** @var \Jihoun\Calendar\Property\ProductIdentifier  */
    protected $prodid;
    /** @var \Jihoun\Calendar\Property\Version  */
    protected $version;
    /** @var \Jihoun\Calendar\Property\CalendarScale */
    public $calscale = null;
    public $method = null;
    
    private $componentList = [];

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
    public function &addComponent(Component\IComponent $component): Calendar
    {
        $this->componentList[] = $component;
        return $this;
    }

    /**
     * @param Component\TimeZone $tz
     * @return $this
     */
    public function &addTimeZone(Component\TimeZone $tz): Calendar
    {
        $this->componentList[] = $tz;
        return $this;
    }

    /**
     * @return string
     */
    public function toString(): string
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
