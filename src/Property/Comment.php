<?php
namespace Triedge\Calendar\Property;

/**
 * This property specifies non-processing information intended to provide a
 * comment to the calendar user.
 */
class Comment extends IText
{
    const NAME = 'COMMENT';

    protected $altrepparam_ = null;
    protected $languageparam_ = null;

    public function getParams()
    {
        return array($this->altrepparam_, $this->languageparam_);
    }
}
