<?php
namespace Triedge\Calendar\Property;

/**
* This property provides a more complete description of the calendar component
* than that provided by the "SUMMARY" property.
*/
class Description extends IText
{
    const NAME = 'DESCRIPTION';

    protected $altrepparam_ = null;
    protected $languageparam_ = null;

    public function getParams()
    {
        return array($this->altrepparam_, $this->languageparam_);
    }
}
