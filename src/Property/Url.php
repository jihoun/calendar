<?php
namespace Jihoun\Calendar\Property;

/**
 * This property defines a Uniform Resource Locator (URL) associated with the
 * iCalendar object.
 */
class Url extends IProperty
{
    const NAME = 'URL';
    protected $url;

    public function __construct($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $this->url = $url;
        }
    }

    public function getValue(): ?string
    {
        return filter_var($this->url, FILTER_VALIDATE_URL) ? $this->url : null;
    }
}
