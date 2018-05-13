<?php
namespace Jihoun\Calendar\Component;

use Jihoun\Calendar\Property\Uid;

/**
 * Class IComponent
 * @package Jihoun\Calendar\Component
 */
abstract class IComponent
{
    /**
     * @return string
     */
    abstract public function toString(): string;

    /**
     * @return \Jihoun\Calendar\Property\Uid
     */
    abstract public function &getUid(): Uid;
}
