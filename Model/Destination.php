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

    /**
     * @var array
     */
    protected $destination;

    /**
     * Destination constructor.
     * @param string $channel
     * @param array $destination
     */
    public function __construct($channel, $destination)
    {
        $this->channel = $channel;
        $this->destination = $destination;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     * @return $this;
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @return array
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param array $destination
     * @return $this;
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }
}
