<?php

namespace Test\Jihoun\Calendar\Component;

use \Jihoun\Calendar\Component as Component;
use \Jihoun\Calendar\Property as Property;

class Alarm extends \PHPUnit_Framework_TestCase
{
    public function testDummy()
    {
        $alarm = new Component\Alarm();
        $this->assertTrue(is_string($alarm->toString()));
    }
}
