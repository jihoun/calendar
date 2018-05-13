<?php

namespace Jihoun\Calendar\Property;

use Jihoun\Calendar\Parameter\InlineEncoding;
use Jihoun\Calendar\Parameter\ValueDataTypes;

/**
 * This property provides the capability to associate a document object with a
 * calendar component.
 */
class Attachment extends IProperty
{
    const NAME = 'ATTACH';

    protected $fmttypeparam = null;

    private $type;
    private $data = null;
    /** @var InlineEncoding */
    private $encoding = null;

    public function getValue(): ?string
    {
        if ($this->type === 'uri') {
            return $this->data;
        } elseif ($this->encoding->getValue() === InlineEncoding::ENC_BASE64) {
            return base64_encode($this->data);
        }
        //TODO 8-bit encode
        //
        return null;
    }

    public function getParams(): array
    {
        $res = [$this->fmttypeparam];
        if ($this->type === 'binary') {
            $res[] = $this->encoding;
            $res[] = ValueDataTypes::binary();
        }

        return $res;
    }

    protected function __construct()
    {
    }

    public static function uri(string $uri): Attachment
    {
        $res = new static();
        $res->data = $uri;
        $res->type = 'uri';

        return $res;
    }

    public static function binary(string $text, InlineEncoding $encoding = null): Attachment
    {
        $res = new static();
        $res->data = $text;
        $res->type = 'binary';
        if (is_null($encoding)) {
            $encoding = InlineEncoding::base64();
        }
        $res->encoding = $encoding;

        return $res;
    }
}
