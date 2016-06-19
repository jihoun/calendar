<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies the identifier for the product that created the
 * iCalendar object.
 */
class ProductIdentifier extends IText
{
    const NAME = 'PRODID';

    protected $text_ = '-//Triedge//EN';

    public function __construct($text = null)
    {
        if (!is_null($text)) {
            parent::__construct($text);
        }
    }
}
