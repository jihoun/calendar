<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines an "Attendee" within a calendar component.
 */
class Attendee
{
    const NAME = 'ATTENDEE';
    
    protected $mail_;

    public function __construct($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email_ = $email;
        }
    }

    public function toString()
    {
        if (filter_var($this->email_, FILTER_VALIDATE_EMAIL)) {
            $res = static::NAME.':';
            $res .= 'mailto:'.$this->email_;
            $res .= "\n";
            return $res;
        } else {
            return '';
        }
    }
}
