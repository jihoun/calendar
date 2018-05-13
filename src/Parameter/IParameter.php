<?php

namespace Jihoun\Calendar\Parameter;

abstract class IParameter
{
    const NAME = '';

    /**
     * @return string|null
     */
    abstract public function getValue(): ?string;

    final public function toString(): string
    {
        $value = $this->getValue();
        if (is_null($value)) {
            return '';
        }

        return ';' . static::NAME . '=' . $value;
    }
}
