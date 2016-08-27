<?php
namespace Jihoun\Calendar\Property;

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
    private $encoding = null;

    public function getValue()
    {
        if ($this->type==='uri') {
            return $this->data;
        } else {
            if ($this->encoding->getValue() === \Jihoun\Calendar\Parameter\InlineEncoding::ENC_BASE64) {
                return base64_encode($this->data);
            } else {
                //TODO 8-bit encode
                //
                return null;
            }
        }
    }

    public function getParams()
    {
        $res = array($this->fmttypeparam);
        if ($this->type==='binary') {
            $res[] = $this->encoding;
            $res[] = \Jihoun\Calendar\Parameter\ValueDataTypes::binary();
        }
        return $res;
    }

    protected function __construct()
    {
    }

    public static function uri($uri)
    {
        $res = new static();
        $res->data = $uri;
        $res->type = 'uri';
        return $res;
    }

    public static function binary($text, \Jihoun\Calendar\Parameter\InlineEncoding $encoding = null)
    {
        $res = new static();
        $res->data = $text;
        $res->type = 'binary';
        if (is_null($encoding)) {
            $encoding = \Jihoun\Calendar\Parameter\InlineEncoding::base64();
        }
        $res->encoding = $encoding;
        return $res;
    }
}
