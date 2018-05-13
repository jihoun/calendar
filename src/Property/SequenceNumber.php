<?php

namespace Jihoun\Calendar\Property;

class SequenceNumber
{
    const NAME = 'SEQUENCE';
    protected $integer = 0;

    public function __construct(int $val = 0)
    {
        $this->integer = (int)$val;
    }

    public function toString(): string
    {
        return self::NAME . ':' . $this->integer . "\n";
    }

    public function &inc(): SequenceNumber
    {
        $this->integer++;

        return $this;
    }
}
