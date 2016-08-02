<?php
/**
 * Created by PhpStorm.
 * User: tperrin
 * Date: 22/06/2016
 * Time: 18:12.
 */
namespace PlanMyLife\NotificationBundle\Service;

use PlanMyLife\NotificationBundle\Event\NotificationEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class NotificationService
{
    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param $object
     * @param array $channel
     *
     * @return bool
     */
    public function notify($object, array $channel = [])
    {
        if (is_object($object)) {
            $event = new NotificationEvent($object, $channel);
            $this->dispatcher->dispatch(NotificationEvent::NAME, $event);

            return true;
        }

        return false;
    }
}
