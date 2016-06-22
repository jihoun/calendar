<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the organizer for a calendar component.
 */
class Organizer extends Attendee
{
    const NAME = 'ORGANIZER';

    protected $cnparam_ = null;
    protected $dirparam_ = null;
    protected $sentbyparam_ = null;
    protected $languageparam_ = null;

    public function getParams()
    {
        return array(
            $this->cnparam_,
            $this->dirparam_,
            $this->sentbyparam_,
            $this->languageparam_
        );
    }
}
