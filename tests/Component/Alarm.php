<?php

namespace Test\Triedge\Calendar\Component;

use \Triedge\Calendar\Component as Component;
use \Triedge\Calendar\Property as Property;

class Alarm extends \PHPUnit_Framework_TestCase
{
    public function testDummy()
    {
        $alarm = new Component\Alarm();
        $this->assertTrue(is_string($alarm->toString()));
    }
}
