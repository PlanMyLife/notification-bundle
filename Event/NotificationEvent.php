<?php

namespace PlanMyLife\NotificationBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class NotificationEvent extends Event
{
    const NAME = 'pml.notification';

    /** @var  mixed */
    protected $subject;

    /** @var  array */
    protected $channels;

    /** @var array */
    protected $types;

    public function __construct($subject, $channels = [], $types = [])
    {
        $this->subject = $subject;
        $this->channels = $channels;
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
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * @param array $channels
     *
     * @return $this
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;

        return $this;
    }

    /**
     * @param string $channel
     */
    public function addChannel($channel)
    {
        array_push($this->channels, $channel);
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
