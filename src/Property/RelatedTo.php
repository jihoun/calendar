<?php
namespace Triedge\Calendar\Property;

/**
 * This property is used to represent a relationship or reference between one
 * calendar component and another.
 */
class RelatedTo
{
    const NAME = 'RELATED-TO';

    protected $relatedTo_ = null;
    public function __construct(\Triedge\Calendar\Component\IComponent $comp)
    {
        $this->relatedTo_ = $comp;
    }

    public function toString()
    {
        return self::NAME.':'.$this->relatedTo_->getUid()->getValue()."\n";
    }
}
