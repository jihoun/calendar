<?php

namespace Jihoun\Calendar\Property;

abstract class IProperty
{
    const NAME = '';

    abstract public function getValue(): ?string;

    public function getParams(): array
    {
        return [];
    }

    final public function toString(): string
    {
        $value = $this->getValue();
        if (is_null($value)) {
            return '';
        }
        $res = static::NAME;
        foreach ($this->getParams() as $param) {
            if (!is_null($param)) {
                $res .= $param->toString();
            }
        }
        $res .= ':' . $value . "\r\n";

        return $res;
    }
}
