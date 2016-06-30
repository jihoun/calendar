<?php

namespace Test\Triedge\Calendar\Component;

use \Triedge\Calendar\Component as Component;
use \Triedge\Calendar\Property as Property;

class TimeZone extends \PHPUnit_Framework_TestCase
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
