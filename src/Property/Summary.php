<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines a short summary or subject for the calendar component.
 */
class Summary extends IText
{
    const NAME = 'SUMMARY';

    protected $altrepparam = null;
    protected $languageparam = null;

    public function getParams()
    {
        return array($this->altrepparam, $this->languageparam);
    }
}
