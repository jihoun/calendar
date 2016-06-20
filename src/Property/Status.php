<?php
namespace Triedge\Calendar\Property;

/**
 * This property defines the overall status or confirmation for the calendar
 * component.
 * @todo make it stronger to follow the documentation
 */
class Status extends IText
{
    const NAME = 'STATUS';

    const TENTATIVE     = 'TENTATIVE';      //Indicates event is tentative.
    const CONFIRMED     = 'CONFIRMED';      //Indicates event is definite.

    const NEEDS_ACTION  = 'NEEDS-ACTION';   //Indicates to-do needs action.
    const COMPLETED     = 'COMPLETED';      //Indicates to-do completed.
    const IN_PROCESS    = 'IN-PROCESS';     //Indicates to-do in process of.

    const DRAFT         = 'DRAFT';          //Indicates journal is draft.
    const FINAL_        = 'FINAL';          //Indicates journal is final.

    const CANCELLED     = 'CANCELLED';      //Indicates journal is removed.
                                            //Indicates event was cancelled.
                                            //Indicates to-do was cancelled.
    
    //TODO specify make sure that only the above status are used and make sure
    //it is dependent on the component type
}
