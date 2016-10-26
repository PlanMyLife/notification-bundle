<?php
/**
 * Created by PhpStorm.
 * User: tperrin
 * Date: 22/06/2016
 * Time: 18:12.
 */
namespace PlanMyLife\NotificationBundle\Service;

use PlanMyLife\NotificationBundle\Event\NotificationEvent;
use PlanMyLife\NotificationBundle\EventListener\NotificationListenerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class NotificationService
{
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * @var boolean
     */
    protected $enable;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->enable = true;
    }

    public function disableNotification()
    {
        $this->enable = false;
    }

    /**
     * @param $object
     * @param array $destinations
     * @param array $types
     *
     * @return bool
     */
    public function notify($object, array $destinations = [], $types = [])
    {
        if ($this->enable && is_object($object)) {
            $event = new NotificationEvent($object, $destinations, $types);
            $this->dispatcher->dispatch(NotificationEvent::NAME, $event);

            return true;
        }

        return false;
    }
}
