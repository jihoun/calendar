<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the intended venue for the activity defined by a
 * calendar component.
 */
class Location extends IText
{
    const NAME = 'LOCATION';

    protected $altrepparam = null;
    protected $languageparam = null;

    public function getParams()
    {
        return array($this->altrepparam, $this->languageparam);
    }
}
