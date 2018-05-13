<?php

namespace Test\Jihoun\Calendar\Component;

use \Jihoun\Calendar\Component as Component;
use \Jihoun\Calendar\Property as Property;
use PHPUnit\Framework\TestCase;

class Alarm extends TestCase
{
    public function testDummy()
    {
        $alarm = new Component\Alarm();
        $this->assertTrue(is_string($alarm->toString()));
    }
}
