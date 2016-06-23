<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies information related to the global position for the
 * activity specified by a calendar component.
 */
class GeographicPosition extends IProperty
{
    const NAME = 'GEO';

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
        } else {
            throw new \Exception('Invlid params for GeographicPosition::__construct');
        }
    }

    public function getValue()
    {
        return $this->lat_.';'.$this->lon_;
    }
}
