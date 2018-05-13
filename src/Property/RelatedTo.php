<?php
namespace Jihoun\Calendar\Property;

use Jihoun\Calendar\Component\IComponent;

/**
 * This property is used to represent a relationship or reference between one
 * calendar component and another.
 */
class RelatedTo extends IProperty
{
    const NAME = 'RELATED-TO';

    protected $relatedTo = null;
    
    public function __construct(IComponent $comp)
    {
        $this->relatedTo = $comp;
    }

    public function getValue(): ?string
    {
        return $this->relatedTo->getUid()->getValue();
    }
}
