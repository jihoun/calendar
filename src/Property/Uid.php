<?php
namespace Jihoun\Calendar\Property;

/**
 * This property defines the persistent, globally unique identifier for the
 * calendar component.
 */
class Uid extends IText
{
    const NAME = 'UID';

    public function __construct($text = null)
    {
        if (!is_string($text)) {
            $text = md5(uniqid(mt_rand(), true));
        }
        parent::__construct($text);
    }

    public function setValue($text)
    {
        if (is_string($text)) {
            $this->text = $text;
        }
    }
}
