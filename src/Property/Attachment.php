<?php
namespace Triedge\Calendar\Property;

/**
 * This property provides the capability to associate a document object with a
 * calendar component.
 */
class Attachment extends IProperty
{
    const NAME = 'ATTACH';

    protected $fmttypeparam_ = null;

    private $type_;
    private $data_ = null;
    private $encoding_ = null;

    public function getValue()
    {
        if ($this->type_==='uri') {
            return $this->data_;
        } else {
            if($this->encoding_->getValue() === \Triedge\Calendar\Parameter\InlineEncoding::ENC_BASE64) {
                return base64_encode($this->data_);
            } else {
                //TODO 8-bit encode
                //
                return null;
            }
        }
    }

    public function getParams()
    {
        $res = array($this->fmttypeparam_);
        if ($this->type_==='binary') {
            $res[] = $this->encoding_;
            $res[] = \Triedge\Calendar\Parameter\ValueDataTypes::binary();
        }
        return $res;
    }

    protected function __construct()
    {}

    public static function uri($uri)
    {
        $res = new static();
        $res->data_ = $uri;
        $res->type_ = 'uri';
        return $res;
    }

    public static function binary($text, \Triedge\Calendar\Parameter\InlineEncoding $encoding = null)
    {
        $res = new static();
        $res->data_ = $text;
        $res->type_ = 'binary';
        if (is_null($encoding)) {
            $encoding = \Triedge\Calendar\Parameter\InlineEncoding::base64();
        }
        $res->encoding_ = $encoding;
        return $res;
    }
}
