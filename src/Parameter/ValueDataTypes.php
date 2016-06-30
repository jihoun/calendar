<?php
namespace Triedge\Calendar\Parameter;

class ValueDataTypes extends IParameter
{
    const NAME = 'VALUE';
    
    const BINARY = "BINARY";
    const BOOLEAN_ = "BOOLEAN";
    const CAL_ADDRESS = "CAL-ADDRESS";
    const DATE = "DATE";
    const DATE_TIME = "DATE-TIME";
    const DURATION = "DURATION";
    const FLOAT_ = "FLOAT";
    const INTEGER_ = "INTEGER";
    const PERIOD = "PERIOD";
    const RECUR = "RECUR";
    const TEXT = "TEXT";
    const TIME = "TIME";
    const URI = "URI";
    const UTC_OFFSET = "UTC-OFFSET";

    protected $value;

    public function getValue()
    {
        return $this->value;
    }

    /**
     * Protected constructor as instances should be built through the static
     * classes
     * @param string $value
     */
    protected function __construct($value)
    {
        $this->value = $value;
    }

    public static function binary()
    {
        return new static(static::BINARY);
    }
    public static function boolean()
    {
        return new static(static::BOOLEAN_);
    }
    public static function calAddress()
    {
        return new static(static::CAL_ADDRESS);
    }
    public static function date()
    {
        return new static(static::DATE);
    }
    public static function dateTime()
    {
        return new static(static::DATE_TIME);
    }
    public static function duration()
    {
        return new static(static::DURATION);
    }
    public static function float()
    {
        return new static(static::FLOAT_);
    }
    public static function integer()
    {
        return new static(static::INTEGER_);
    }
    public static function period()
    {
        return new static(static::PERIOD);
    }
    public static function recur()
    {
        return new static(static::RECUR);
    }
    public static function text()
    {
        return new static(static::TEXT);
    }
    public static function time()
    {
        return new static(static::TIME);
    }
    public static function uri()
    {
        return new static(static::URI);
    }
    public static function utcOffest()
    {
        return new static(static::UTC_OFFSET);
    }
}
