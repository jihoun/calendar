# Build calendar (.ics) file in php
This library allows quickly generating ics files in php.
Outputs should be compatible with the standard https://tools.ietf.org/html/rfc5545.
But currently, not every single bit of the standard is implemented.
## Use
You can load this library in your project using composer:
```json
{
   "require": {
       "jihoun/calendar": "dev-master"
   },
}
```
Then in your code, do the following
```php
$event = new \Jihoun\Calendar\Component\Event();
$event
    ->setDateTimeStart(new Property\DateTimeStart(new \DateTime()))
    ->setDateTimeEnd(new Property\DateTimeEnd(new \DateTime()))
    ->setDescription(new Property\Description('Very very lengthy description'))
    ->setLocation(new Property\Location('in the office'))
    ->setOrganizer(new Property\Organizer('john.doe@gmail.com'))
    ->setSummary(new Property\Summary('new test event'));
$cal = new \Jihoun\Calendar\Calendar();
$cal->addComponent($event);
file_put_contents('cal.ics', $cal->toString());
```
## Contributions and feedbacks
Feel free to make me any feedback and/or contribution.
