<?php
namespace Triedge\Calendar\Property;

abstract class ITextList
{
    protected $texts_ = array();

    public function __construct(array $values = array())
    {
        foreach ($values as $value) {
            $this->addValue($value);
        }
    }

    public function toString()
    {
        //TODO sanitize text
        $res = static::NAME.':';
        foreach ($this->texts_ as $value) {
            $res .= $value .',';
        }
        $res .= "\n";
        return $res;
    }

    /**
     * @param string $value [description]
     * @return ITextList
     */
    public function &addValue($value)
    {
        if (is_string($value)) {
            $this->texts_[] = $value;
        }
        return $this;
    }
}
