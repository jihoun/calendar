<?php
namespace Triedge\Calendar\Property;

/**
 * This property is used to represent contact information or alternately a
 * reference to contact information associated with the calendar component.
 */
class Contact extends IText
{
    const NAME = 'CONTACT';

    protected $altrepparam = null;
    protected $languageparam = null;

    public function getParams()
    {
        return array($this->altrepparam, $this->languageparam);
    }
}
