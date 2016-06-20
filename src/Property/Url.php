<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines a Uniform Resource Locator (URL) associated with the
 * iCalendar object.
 */
class Url
{
    const NAME = 'URL';
    protected $url_;

    public function __construct($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $this->url_ = $url;
        }
    }

    public function toString()
    {
        if (filter_var($this->url_, FILTER_VALIDATE_URL)) {
            return self::NAME.':'.$this->url_."\n";
        } else {
            return '';
        }
    }
}
