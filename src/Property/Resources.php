<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the equipment or resources anticipated for an activity
 * specified by a calendar component.
 */
class Resources extends ITextList
{
    const NAME = 'RESOURCES';

    protected $altrepparam = null;
    protected $languageparam = null;

    public function getParams()
    {
        return array($this->altrepparam, $this->languageparam);
    }
}
