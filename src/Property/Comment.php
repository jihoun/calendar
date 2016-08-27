<?php
namespace Jihoun\Calendar\Property;

/**
 * This property specifies non-processing information intended to provide a
 * comment to the calendar user.
 */
class Comment extends IText
{
    const NAME = 'COMMENT';

    protected $altrepparam = null;
    protected $languageparam = null;

    public function getParams()
    {
        return array($this->altrepparam, $this->languageparam);
    }
}
