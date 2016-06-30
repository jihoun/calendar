<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies the identifier for the product that created the
 * iCalendar object.
 */
class ProductIdentifier extends IProperty
{
    const NAME = 'PRODID';

    protected $text = '-//Triedge//EN';
    protected $company;
    protected $product;
    protected $lang;

    public function __construct($company = 'triedge', $product = 'calendar', $lang = 'EN')
    {
        $this->company = $company;
        $this->product = $product;
        $this->lang = $lang;
    }

    public function getValue()
    {
        return '-//'.$this->company.'//'.$this->product.'//'.$this->lang;
    }
}
