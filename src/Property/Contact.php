<?php
namespace Triedge\Calendar\Property;

/**
 * This property is used to represent contact information or alternately a
 * reference to contact information associated with the calendar component.
 */
class Contact extends IText
{
    const NAME = 'CONTACT';

    protected $altrepparam_ = null;
    protected $languageparam_ = null;

    public function getParams()
    {
        return array($this->altrepparam_, $this->languageparam_);
    }
}
