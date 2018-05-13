<?php
namespace Jihoun\Calendar\Property;

abstract class ITextList extends IProperty
{
    protected $texts = [];

    public function __construct(array $values = [])
    {
        foreach ($values as $value) {
            $this->addValue($value);
        }
    }

    /**
     * @inheritDoc
     */
    public function getValue(): ?string
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
     * @param string $value
     * @return ITextList
     */
    public function &addValue(string $value): ITextList
    {
        $this->texts[] = $value;
        return $this;
    }

    /**
     * @param array $values
     * @return  ITextList
     */
    public function &addValues(array $values): ITextList
    {
        foreach ($values as $value) {
            $this->addValue($value);
        }
        return $this;
    }
}
