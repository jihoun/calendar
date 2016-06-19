<?php
namespace Triedge\Calendar\Property;

class GeographicPosition
{
    public $lat_;
    public $lon_;

    /**
     * Constructor
     * @param double $lat [description]
     * @param double $lon [description]
     */
    public function __construct($lat, $lon)
    {
        if (is_numeric($lat) && is_numeric($lon)) {
            $this->lat_ = (double)$lat;
            $this->lon_ = (double)$lon;
        }
    }

    public function toString()
    {
        return 'GEO:'.$this->lat_.';'.$this->lon_."\n";
    }
}