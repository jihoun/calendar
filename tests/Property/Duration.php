<?php

namespace Test\Triedge\Calendar\Property;

use \Triedge\Calendar\Component as Component;
use \Triedge\Calendar\Property as Property;

class Duration extends \PHPUnit_Framework_TestCase
{
    public function testDuration()
    {
        $duration = new Property\Duration(0, 1, 1, 1, 1);
        $value = $duration->getValue();
        $this->assertTrue(is_string($value));
    }
}
