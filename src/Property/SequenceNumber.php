<?php
namespace Triedge\Calendar\Property;

class SequenceNumber
{
    const NAME = 'SEQUENCE';
    protected $integer = 0;
    
    public function __construct($val = 0)
    {
        if (is_numeric($val)) {
            $this->integer = (int)$val;
        }
    }

    public function toString()
    {
        return self::NAME.':'.$this->integer."\n";
    }

    public function &inc()
    {
        $this->integer++;
        return $this;
    }
}
