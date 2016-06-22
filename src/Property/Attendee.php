<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines an "Attendee" within a calendar component.
 */
class Attendee extends IProperty
{
    const NAME = 'ATTENDEE';
    
    protected $mail_;

    protected $cutypeparam_ = null;
    protected $memberparam_ = null;
    protected $roleparam_ = null;
    protected $partstatparam_ = null;
    protected $rsvpparam_ = null;
    protected $deltoparam_ = null;
    protected $delfromparam_ = null;
    protected $sentbyparam_ = null;
    protected $cnparam_ = null;
    protected $dirparam_ = null;
    protected $languageparam_ = null;

    public function __construct($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email_ = $email;
        }
    }

    public function getValue()
    {
        if (filter_var($this->email_, FILTER_VALIDATE_EMAIL)) {
            return 'mailto:'.$this->email_;
        } else {
            return null;
        }
    }

    public function getParams()
    {
        return array(
            $this->cutypeparam_,
            $this->memberparam_,
            $this->roleparam_,
            $this->partstatparam_,
            $this->rsvpparam_,
            $this->deltoparam_,
            $this->delfromparam_,
            $this->sentbyparam_,
            $this->cnparam_,
            $this->dirparam_,
            $this->languageparam_
        );
    }
}
