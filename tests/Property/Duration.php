<?php

namespace Test\Triedge\Calendar\Property;

use \Triedge\Calendar\Component as Component;
use \Triedge\Calendar\Property as Property;

class Duration extends \PHPUnit_Framework_TestCase
{
    public function testDuration1()
    {
        $duration = new Property\Duration(1);
        $this->assertEquals('1W', $duration->getValue());
    }

    public function testDuration2()
    {
        $duration = new Property\Duration();
        $this->assertNull($duration->getValue());
    }

    public function testDuration3()
    {
        $duration = new Property\Duration(0, 1);
        $value = $duration->getValue();
        $this->assertEquals('1D', $duration->getValue());
    }

    public function testDuration4()
    {
        $duration = new Property\Duration(0, 0, 1);
        $value = $duration->getValue();
        $this->assertEquals('T1H', $duration->getValue());
    }

    public function testDuration5()
    {
        $duration = new Property\Duration(0, 0, 0, 1);
        $value = $duration->getValue();
        $this->assertEquals('T0H1M', $duration->getValue());
    }

    public function testDuration6()
    {
        $duration = new Property\Duration(0, 0, 0, 0, 1);
        $value = $duration->getValue();
        $this->assertEquals('T0H0M1S', $duration->getValue());
    }
}
