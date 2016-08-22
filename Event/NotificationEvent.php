<?php

namespace PlanMyLife\NotificationBundle\Event;

use PlanMyLife\NotificationBundle\Model\Destination;
use Symfony\Component\EventDispatcher\Event;

class NotificationEvent extends Event
{
    const NAME = 'pml.notification';

    /** @var  mixed */
    protected $subject;

    /** @var  array */
    protected $destinations;

    /** @var array */
    protected $types;

    public function __construct($subject, $destinations = [], $types = [])
    {
        $this->subject = $subject;
        $this->destinations = $destinations;
        $this->types = $types;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     *
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return array
     */
    public function getDestinations()
    {
        return $this->destinations;
    }

    /**
     * @param array $destinations
     * @return $this;
     */
    public function setDestinations($destinations)
    {
        $this->destinations = $destinations;
        return $this;
    }

    /**
     * @param Destination $destination
     */
    public function addDestination($destination)
    {
        array_push($this->destinations, $destination);
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param array $types
     * @return $this;
     */
    public function setTypes($types)
    {
        $this->types = $types;
        return $this;
    }
}
