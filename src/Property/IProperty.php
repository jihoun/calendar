<?php
namespace Jihoun\Calendar\Property;

abstract class IProperty
{
    abstract public function getValue();
    public function getParams()
    {
        return array();
    }

    public function toString()
    {
        $value = $this->getValue();
        if (is_null($value)) {
            return '';
        } else {
            $res = static::NAME;
            foreach ($this->getParams() as $param) {
                if (!is_null($param)) {
                    $res .= $param->toString();
                }
            }
            $res .= ':'.$value."\r\n";
            return $res;
        }
    }
}
