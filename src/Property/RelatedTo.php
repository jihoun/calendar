<?php
namespace Jihoun\Calendar\Property;

/**
 * This property is used to represent a relationship or reference between one
 * calendar component and another.
 */
class RelatedTo extends IProperty
{
    const NAME = 'RELATED-TO';

    protected $relatedTo = null;
    
    public function __construct(\Jihoun\Calendar\Component\IComponent $comp)
    {
        $this->relatedTo = $comp;
    }

    public function getValue()
    {
        return $this->relatedTo->getUid()->getValue();
    }
}
