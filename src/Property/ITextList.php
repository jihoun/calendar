<?php
namespace Triedge\Calendar\Property;

abstract class ITextList extends IProperty
{
    protected $texts = array();

    public function __construct(array $values = array())
    {
        foreach ($values as $value) {
            $this->addValue($value);
        }
    }

    public function getValue()
    {
        if (empty($this->texts)) {
            return null;
        }
        
        $res = '';
        foreach ($this->texts as $value) {
            //TODO sanitize text
            $res .= $value .',';
        }
        $res = substr($res, 0, -1);
        return $res;
    }

    /**
     * @param string $value [description]
     * @return ITextList
     */
    public function &addValue($value)
    {
        if (is_string($value)) {
            $this->texts[] = $value;
        }
        return $this;
    }

    public function &addValues(array $values)
    {
        foreach ($values as $value) {
            $this->addValue($value);
        }
    }
}
