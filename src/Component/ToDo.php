<?php
namespace Jihoun\Calendar\Component;

use Jihoun\Calendar\Property\Attachment;
use Jihoun\Calendar\Property\Attendee;
use Jihoun\Calendar\Property\Categories;
use Jihoun\Calendar\Property\Classification;
use Jihoun\Calendar\Property\Comment;
use Jihoun\Calendar\Property\Contact;
use Jihoun\Calendar\Property\DateTimeCompleted;
use Jihoun\Calendar\Property\DateTimeCreated;
use Jihoun\Calendar\Property\DateTimeDue;
use Jihoun\Calendar\Property\DateTimeStamp;
use Jihoun\Calendar\Property\DateTimeStart;
use Jihoun\Calendar\Property\Description;
use Jihoun\Calendar\Property\Duration;
use Jihoun\Calendar\Property\ExceptionDateTimes;
use Jihoun\Calendar\Property\GeographicPosition;
use Jihoun\Calendar\Property\IanaProperty;
use Jihoun\Calendar\Property\LastModified;
use Jihoun\Calendar\Property\Location;
use Jihoun\Calendar\Property\Organizer;
use Jihoun\Calendar\Property\PercentComplete;
use Jihoun\Calendar\Property\Priority;
use Jihoun\Calendar\Property\RecurrenceDateTimes;
use Jihoun\Calendar\Property\RecurrenceId;
use Jihoun\Calendar\Property\RecurrenceRule;
use Jihoun\Calendar\Property\RelatedTo;
use Jihoun\Calendar\Property\RequestStatus;
use Jihoun\Calendar\Property\Resources;
use Jihoun\Calendar\Property\SequenceNumber;
use Jihoun\Calendar\Property\Summary;
use Jihoun\Calendar\Property\ToDoStatus;
use Jihoun\Calendar\Property\Uid;
use Jihoun\Calendar\Property\Url;
use Jihoun\Calendar\Property\XProperty;

/**
 * Provide a grouping of calendar properties that describe a to-do.
 */
class ToDo extends IComponent
{
    // The following are REQUIRED,
    // but MUST NOT occur more than once.
    protected $dtstamp;
    protected $uid;
    // The following are OPTIONAL,
    // but MUST NOT occur more than once.
    protected $class = null;
    protected $completed = null;
    protected $created = null;
    protected $description = null;
    protected $dtstart = null;
    protected $geo = null;
    protected $lastMod = null;
    protected $location = null;
    protected $organizer = null;
    protected $percent = null;
    protected $priority = null;
    protected $recurid = null;
    protected $seq = null;
    protected $status = null;
    protected $summary = null;
    protected $url = null;
    // The following is OPTIONAL,
    // but SHOULD NOT occur more than once.
    protected $rrule = null;
    // Either 'due' or 'duration' MAY appear in
    // a 'todoprop', but 'due' and 'duration'
    // MUST NOT occur in the same 'todoprop'.
    // If 'duration' appear in a 'todoprop',
    // then 'dtstart' MUST also appear in
    // the same 'todoprop'.
    protected $due;
    protected $duration;
    // The following are OPTIONAL,
    // and MAY occur more than once.
    protected $attachList = [];
    protected $attendeeList = [];
    protected $categoriesList = [];
    protected $commentList = [];
    protected $contactList = [];
    protected $exdateList = [];
    protected $rstatusList = [];
    protected $relatedList = [];
    protected $resourcesList = [];
    protected $rdateList = [];
    protected $xPropList = [];
    protected $ianaPropList = [];

    public function __construct()
    {
        $this->dtstamp = new DateTimeStamp();
        $this->uid = new Uid();
    }

    private function getProperties(): array
    {
        $res = [
            $this->dtstamp,
            $this->uid,
            $this->class,
            $this->completed,
            $this->created,
            $this->description,
            $this->dtstart,
            $this->geo,
            $this->lastMod,
            $this->location,
            $this->organizer,
            $this->percent,
            $this->priority,
            $this->recurid,
            $this->seq,
            $this->status,
            $this->summary,
            $this->url,
            $this->rrule
        ];
        
        if (!is_null($this->due)) {
            $res[] = $this->due;
        } elseif (!is_null($this->duration)) {
            $res[] = $this->duration;
        }

        $res = array_merge(
            $res,
            $this->attachList,
            $this->attendeeList,
            $this->categoriesList,
            $this->commentList,
            $this->contactList,
            $this->exdateList,
            $this->rstatusList,
            $this->relatedList,
            $this->resourcesList,
            $this->rdateList,
            $this->xPropList,
            $this->ianaPropList
        );

        return $res;
    }

    public function toString(): string
    {
        $res = "BEGIN:VTODO\n";
        foreach ($this->getProperties() as $property) {
            if (!is_null($property)) {
                $res .= $property->toString();
            }
        }
        $res .= "END:VTODO\n";
        return $res;
    }

    public function &getUid(): Uid
    {
        return $this->uid;
    }

    public function &setClassification(Classification $class): ToDo
    {
        $this->class = $class;
        return $this;
    }

    public function &setDateTimeCompleted(DateTimeCompleted $completed): ToDo
    {
        $this->completed = $completed;
        return $this;
    }

    public function &setDateTimeCreated(DateTimeCreated $created): ToDo
    {
        $this->created = $created;
        return $this;
    }

    public function &setDescription(Description $description): ToDo
    {
        $this->description = $description;
        return $this;
    }

    public function &setDateTimestart(DateTimeStart $dtStart): ToDo
    {
        $this->dtstart = $dtStart;
        return $this;
    }

    public function &setGeographicPosition(GeographicPosition $geo): ToDo
    {
        $this->geo = $geo;
        return $this;
    }

    public function &setLastModified(LastModified $lastMod): ToDo
    {
        $this->lastMod = $lastMod;
        return $this;
    }

    public function &setLocation(Location $location): ToDo
    {
        $this->location = $location;
        return $this;
    }

    public function &setOrganizer(Organizer $organizer): ToDo
    {
        $this->organizer = $organizer;
        return $this;
    }

    public function &setPercentComplete(PercentComplete $percent): ToDo
    {
        $this->percent = $percent;
        return $this;
    }

    public function &setPriority(Priority $priority): ToDo
    {
        $this->priority = $priority;
        return $this;
    }

    public function &setRecurrenceId(RecurrenceId $recurid): ToDo
    {
        $this->recurid = $recurid;
        return $this;
    }

    public function &setSequenceNumber(SequenceNumber $seq): ToDo
    {
        $this->seq = $seq;
        return $this;
    }

    public function &setStatus(ToDoStatus $status): ToDo
    {
        $this->status = $status;
        return $this;
    }
    
    public function &setSummary(Summary $summary): ToDo
    {
        $this->summary = $summary;
        return $this;
    }
    
    public function &setUrl(Url $url): ToDo
    {
        $this->url = $url;
        return $this;
    }

    public function &setRecurrenceRule(RecurrenceRule $rrule): ToDo
    {
        $this->rrule = $rrule;
        return $this;
    }

    public function &setDateTimeDue(DateTimeDue $due): ToDo
    {
        $this->due = $due;
        return $this;
    }

    public function &setDuration(Duration $duration): ToDo
    {
        $this->duration = $duration;
        return $this;
    }

    public function &addAttachment(Attachment $attach): ToDo
    {
        $this->attachList[] = $attach;
        return $this;
    }

    public function &addAttendee(Attendee $attendee): ToDo
    {
        $this->attendeeList[] = $attendee;
        return $this;
    }

    public function &addCategories(Categories $categories): ToDo
    {
        $this->categoriesList[] = $categories;
        return $this;
    }

    public function &addComment(Comment $comment): ToDo
    {
        $this->commentList[] = $comment;
        return $this;
    }

    public function &addcontact(Contact $contact): ToDo
    {
        $this->contactList[] = $contact;
        return $this;
    }
    
    public function &addExceptionDateTimes(ExceptionDateTimes $exdate): ToDo
    {
        $this->exdateList[] = $exdate;
        return $this;
    }
    
    public function &addRequestStatus(RequestStatus $rstatus): ToDo
    {
        $this->rstatusList[] = $rstatus;
        return $this;
    }

    public function &addRelatedTo(RelatedTo $related): ToDo
    {
        $this->relatedList[] = $related;
        return $this;
    }
    public function &addResources(Resources $resources): ToDo
    {
        $this->resourcesList[] = $resources;
        return $this;
    }
    public function &addRecurrenceDateTimes(RecurrenceDateTimes $rdate): ToDo
    {
        $this->rdateList[] = $rdate;
        return $this;
    }
    public function &addXProperty(XProperty $xProp): ToDo
    {
        $this->xPropList[] = $xProp;
        return $this;
    }
    public function &addIanaProperty(IanaProperty $ianaProp): ToDo
    {
        $this->ianaPropList[] = $ianaProp;
        return $this;
    }
}
