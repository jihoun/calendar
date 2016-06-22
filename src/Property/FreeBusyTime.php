<?php
namespace Triedge\Calendar\Property;

class FreeBusyTime extends IProperty
{
    const NAME = 'FREEBUSY';

    protected $fmttypeparam_ = null;

    public function getParams()
    {
        return array($this->fmttypeparam_);
    }
    //TODO
}
