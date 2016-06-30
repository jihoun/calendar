<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines an "Attendee" within a calendar component.
 */
class Attendee extends IProperty
{
    const NAME = 'ATTENDEE';
    
    protected $mail;

    protected $cutypeparam = null;
    protected $memberparam = null;
    protected $roleparam = null;
    protected $partstatparam = null;
    protected $rsvpparam = null;
    protected $deltoparam = null;
    protected $delfromparam = null;
    protected $sentbyparam = null;
    protected $cnparam = null;
    protected $dirparam = null;
    protected $languageparam = null;

    public function __construct($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        }
    }

    public function getValue()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return 'mailto:'.$this->email;
        } else {
            return null;
        }
    }

    public function getParams()
    {
        return array(
            $this->cutypeparam,
            $this->memberparam,
            $this->roleparam,
            $this->partstatparam,
            $this->rsvpparam,
            $this->deltoparam,
            $this->delfromparam,
            $this->sentbyparam,
            $this->cnparam,
            $this->dirparam,
            $this->languageparam
        );
    }
}
