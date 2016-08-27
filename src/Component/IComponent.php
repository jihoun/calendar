<?php
namespace Jihoun\Calendar\Component;

abstract class IComponent
{
    abstract public function toString();
    abstract public function &getUid();
}
