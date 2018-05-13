<?php

namespace Jihoun\Calendar\Property;

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
     * @param float $lat latitude
     * @param float $lon longitude
     * @throws \Exception
     */
    public function __construct(float $lat, float $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    /**
     * @inheritDoc
     */
    public function getValue(): ?string
    {
        return $this->lat . ';' . $this->lon;
    }
}
