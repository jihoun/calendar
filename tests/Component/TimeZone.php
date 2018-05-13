<?php

namespace Test\Jihoun\Calendar\Component;

use \Jihoun\Calendar\Component as Component;
use \Jihoun\Calendar\Property as Property;
use PHPUnit\Framework\TestCase;

class TimeZone extends TestCase
{
    public function testTimeZone()
    {
        $tz = new Component\TimeZone();
        $tz->setLastModified(new Property\LastModified(new \DateTime()))
            ->setTimeZoneUrl(new Property\TimeZoneUrl('http://coaching.triedgeteam.com'))
            ->addStandardc(new Property\TimeZoneProperty(new Property\DateTimeStart(new \DateTime())))
            ->addDaylightc(new Property\TimeZoneProperty(new Property\DateTimeStart(new \DateTime())));

        $tzStr = $tz->toString();
        $this->assertTrue(is_string($tzStr));
    }
}
