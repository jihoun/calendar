<?php
namespace Jihoun\Calendar\Property;

class FreeBusyTime extends IProperty
{
    const NAME = 'FREEBUSY';

    protected $fmttypeparam = null;

    public function getParams()
    {
        return array($this->fmttypeparam);
    }
    public function getValue()
    {
        //TODO
        return null;
    }
}
