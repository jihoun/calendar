<?php
namespace Jihoun\Calendar\Property;

/**
 * This property defines the categories for a calendar component.
 * @todo change to text list
 */
class Categories extends ITextList
{
    const NAME = 'CATEGORIES';

    protected $languageparam = null;
    
    public function getParams(): array
    {
        return [$this->languageparam];
    }
}
