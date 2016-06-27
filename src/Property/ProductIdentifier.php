<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies the identifier for the product that created the
 * iCalendar object.
 */
class ProductIdentifier extends IProperty
{
    const NAME = 'PRODID';

    protected $text_ = '-//Triedge//EN';
    protected $company_;
    protected $product_;
    protected $lang_;

    public function __construct($company = 'triedge', $product = 'calendar', $lang = 'EN')
    {
        $this->company_ = $company;
        $this->product_ = $product;
        $this->lang_ = $lang;
    }

    public function getValue()
    {
        return '-//'.$this->company_.'//'.$this->product_.'//'.$this->lang_;
    }
}
