<?php
namespace Jihoun\Calendar\Property;

class FreeBusyTime extends IProperty
{
    const NAME = 'FREEBUSY';

    protected $fmttypeparam = null;

    public function getParams(): array
    {
        return [$this->fmttypeparam];
    }
    public function getValue(): ?string
    {
        //TODO
        return null;
    }
}
