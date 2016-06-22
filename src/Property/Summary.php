<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines a short summary or subject for the calendar component.
 */
class Summary extends IText
{
    const NAME = 'SUMMARY';

    protected $altrepparam_ = null;
    protected $languageparam_ = null;

    public function getParams()
    {
        return array($this->altrepparam_, $this->languageparam_);
    }
}
