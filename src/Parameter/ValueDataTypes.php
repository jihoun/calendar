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

    protected $value_;

    public function getValue()
    {
        return $this->value_;
    }

    /**
     * Protected constructor as instances should be built through the static
     * classes
     * @param string $value
     */
    protected function __construct($value)
    {
        $this->value_ = $value;
    }

    public static function BINARY()
    {
        return new static(static::BINARY);
    }
    public static function BOOLEAN()
    {
        return new static(static::BOOLEAN_);
    }
    public static function CAL_ADDRESS()
    {
        return new static(static::CAL-ADDRESS);
    }
    public static function DATE()
    {
        return new static(static::DATE);
    }
    public static function DATE_TIME()
    {
        return new static(static::DATE_TIME);
    }
    public static function DURATION()
    {
        return new static(static::DURATION);
    }
    public static function FLOAT()
    {
        return new static(static::FLOAT_);
    }
    public static function INTEGER()
    {
        return new static(static::INTEGER_);
    }
    public static function PERIOD()
    {
        return new static(static::PERIOD);
    }
    public static function RECUR()
    {
        return new static(static::RECUR);
    }
    public static function TEXT()
    {
        return new static(static::TEXT);
    }
    public static function TIME()
    {
        return new static(static::TIME);
    }
    public static function URI()
    {
        return new static(static::URI);
    }
    public static function UTC_OFFSET()
    {
        return new static(static::UTC_OFFSET);
    }
}
