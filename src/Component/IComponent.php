<?php
namespace Jihoun\Calendar\Component;

/**
 * Class IComponent
 * @package Jihoun\Calendar\Component
 */
abstract class IComponent
{
    /**
     * @return string
     */
    abstract public function toString();

    /**
     * @return \Jihoun\Calendar\Property\Uid
     */
    abstract public function &getUid();
}
