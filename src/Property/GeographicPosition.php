<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies information related to the global position for the
 * activity specified by a calendar component.
 */
class GeographicPosition extends IProperty
{
    const NAME = 'GEO';

    public $lat;
    public $lon;

    /**
     * Constructor
     * @param double $lat latitude
     * @param double $lon longitude
     */
    public function __construct($lat, $lon)
    {
        if (is_numeric($lat) && is_numeric($lon)) {
            $this->lat = (double)$lat;
            $this->lon = (double)$lon;
        } else {
            throw new \Exception('Invlid params for GeographicPosition::__construct');
        }
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->lat.';'.$this->lon;
    }
}
