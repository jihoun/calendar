<?php
namespace Jihoun\Calendar\Property;

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

    public function __construct(string $company = 'triedge', string $product = 'calendar', string $lang = 'EN')
    {
        $this->company = $company;
        $this->product = $product;
        $this->lang = $lang;
    }

    public function getValue(): ?string
    {
        return '-//'.$this->company.'//'.$this->product.'//'.$this->lang;
    }
}
