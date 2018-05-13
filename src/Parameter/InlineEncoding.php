<?php
namespace Jihoun\Calendar\Parameter;

class InlineEncoding extends IParameter
{
    const NAME = 'ENCODING';

    const ENC_8BIT = '8BIT';
    const ENC_BASE64 = 'BASE64';

    protected $value;

    public function getValue(): ?string
    {
        return $this->value;
    }
    protected function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function eightbits(): InlineEncoding
    {
        return new static(static::ENC_8BIT);
    }

    public static function base64(): InlineEncoding
    {
        return new static(static::ENC_BASE64);
    }
}
