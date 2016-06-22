<?php
namespace Triedge\Calendar\Property;

/**
 * This property provides the capability to associate a document object with a
 * calendar component.
 */
class Attachment extends IProperty
{
    const NAME = 'ATTACH';

    protected $fmttypeparam_ = null;

    public function getValue()
    {
        //TODO
        return null;
    }

    public function getParams()
    {
        return array($this->fmttypeparam_);
    }
}
