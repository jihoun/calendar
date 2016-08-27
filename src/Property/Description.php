<?php
namespace Jihoun\Calendar\Property;

/**
* This property provides a more complete description of the calendar component
* than that provided by the "SUMMARY" property.
*/
class Description extends IText
{
    const NAME = 'DESCRIPTION';

    protected $altrepparam = null;
    protected $languageparam = null;

    public function getParams()
    {
        return array($this->altrepparam, $this->languageparam);
    }
}
