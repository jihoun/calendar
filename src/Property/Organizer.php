<?php
namespace Jihoun\Calendar\Property;

/**
 * This property defines the organizer for a calendar component.
 */
class Organizer extends Attendee
{
    const NAME = 'ORGANIZER';

    protected $cnparam = null;
    protected $dirparam = null;
    protected $sentbyparam = null;
    protected $languageparam = null;

    public function getParams()
    {
        return array(
            $this->cnparam,
            $this->dirparam,
            $this->sentbyparam,
            $this->languageparam
        );
    }
}
