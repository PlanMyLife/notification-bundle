<?php
/**
 * User: blackreaven
 * Date: 22/08/2016
 * Time: 13:47
 */
namespace PlanMyLife\NotificationBundle\Model;

class Destination implements DestinationInterface
{
    /**
     * @var string
     */
    protected $channel;

    protected $destination;

    /**
     * Destination constructor.
     * @param string $channel
     */
    public function __construct($channel, $destination)
    {
        $this->channel = $channel;
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param mixed $channel
     * @return $this;
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param mixed $destination
     * @return $this;
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }
}
