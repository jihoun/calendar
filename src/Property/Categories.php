<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the categories for a calendar component.
 * @todo change to text list
 */
class Categories extends ITextList
{
    const NAME = 'CATEGORIES';

    protected $languageparam_ = null;
    
    public function getParams()
    {
        return array($this->languageparam_);
    }
}
