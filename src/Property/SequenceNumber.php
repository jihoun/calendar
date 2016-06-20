<?php
namespace Triedge\Calendar\Property;

class SequenceNumber
{
    const NAME = 'SEQUENCE';
    protected $integer_ = 0;
    
    public function __construct($val = 0)
    {
        if (is_numeric($val)) {
            $this->integer_ = (int)$val;
        }
    }

    public function toString()
    {
        return self::NAME.':'.$this->integer_."\n";
    }

    public function &inc()
    {
        $this->integer_++;
        return $this;
    }
}
