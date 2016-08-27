<?php
namespace Jihoun\Calendar\Parameter;

abstract class IParameter
{
    /**
     * @return string|null
     */
    abstract public function getValue();

    public function toString()
    {
        $value = $this->getValue();
        if (is_null($value)) {
            return '';
        } else {
            return ';'.static::NAME.'='.$value;
        }
    }
}
