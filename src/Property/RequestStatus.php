<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the status code returned for a scheduling request.
 */
class RequestStatus extends IProperty
{
    const NAME = 'REQUEST-STATUS';

    const PRELIMINARY_SUCCESS = 1;
    const SUCCESFUL = 2;
    const CLIENT_ERROR = 3;
    const SCHEDULING_ERROR = 4;

    protected $statcode1_;
    protected $statcode2_ = 0;
    protected $statcode3_ = null;
    protected $statdesc_;
    protected $extData_ = null;

    protected $languageparam_ = null;

    public function __construct($statdesc, $code1, $code2 = 0, $code3 = null, $extData = null)
    {
        $this->statdesc_ = $statdesc;
        $this->statcode1_ = $code1;
        $this->statcode2_ = $code2;
        $this->statcode3_ = $code3;
        $this->extData_ = $extData;
        //TODO
    }

    public function getValue()
    {
        $res = $this->statcode1_.'.'.$this->statcode2_;
        if (!is_null($this->statcode3_)) {
            $res .= '.'.$this->statcode3_;
        }
        //TODO escape text
        $res .= ';'.$this->statdesc_;
        if (!is_null($this->extData_)) {
            $res .= ';'.$this->extData_;
        }
        return $res;
    }

    public function getParams()
    {
        return array($this->languageparam_);
    }
}
