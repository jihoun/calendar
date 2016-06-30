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

    protected $statcode1;
    protected $statcode2 = 0;
    protected $statcode3 = null;
    protected $statdesc;
    protected $extData = null;

    protected $languageparam = null;

    public function __construct($statdesc, $code1, $code2 = 0, $code3 = null, $extData = null)
    {
        $this->statdesc = $statdesc;
        $this->statcode1 = $code1;
        $this->statcode2 = $code2;
        $this->statcode3 = $code3;
        $this->extData = $extData;
        //TODO
    }

    public function getValue()
    {
        $res = $this->statcode1.'.'.$this->statcode2;
        if (!is_null($this->statcode3)) {
            $res .= '.'.$this->statcode3;
        }
        //TODO escape text
        $res .= ';'.$this->statdesc;
        if (!is_null($this->extData)) {
            $res .= ';'.$this->extData;
        }
        return $res;
    }

    public function getParams()
    {
        return array($this->languageparam);
    }
}
