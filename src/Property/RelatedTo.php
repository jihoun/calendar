<?php
namespace Triedge\Calendar\Property;

/**
 * This property is used to represent a relationship or reference between one
 * calendar component and another.
 */
class RelatedTo extends IProperty
{
    const NAME = 'RELATED-TO';

    protected $relatedTo_ = null;
    public function __construct(\Triedge\Calendar\Component\IComponent $comp)
    {
        $this->relatedTo_ = $comp;
    }

    public function getValue()
    {
        return $this->relatedTo_->getUid()->getValue();
    }
}
