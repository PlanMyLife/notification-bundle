<?php

namespace PlanMyLife\NotificationBundle\EventListener;

use PlanMyLife\NotificationBundle\Builder\NotificationBuilderInterface;
use PlanMyLife\NotificationBundle\Event\NotificationEvent;
use PlanMyLife\NotificationBundle\Factory\NotificationBuilderFactoryInterface;
use PlanMyLife\NotificationBundle\Manager\NotificationManagerInterface;
use PlanMyLife\NotificationBundle\Model\Destination;
use PlanMyLife\NotificationBundle\Model\Notification;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

abstract class NotificationListener implements NotificationListenerInterface, EventSubscriberInterface
{
    /**
     * @var NotificationBuilderFactoryInterface
     */
    protected $factory;

    /**
     * @var NotificationManagerInterface
     */
    protected $manager;

    /**
     * NotificationListener constructor.
     *
     * @param NotificationBuilderFactoryInterface $factory
     * @param NotificationManagerInterface $manager
     */
    public function __construct(NotificationBuilderFactoryInterface $factory, NotificationManagerInterface $manager)
    {
        $this->factory = $factory;
        $this->manager = $manager;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            NotificationEvent::NAME => 'onNotification',
        ];
    }

    /**
     * @param NotificationEvent $event
     *
     * @return bool
     */
    public function support(NotificationEvent $event)
    {
        foreach ($event->getDestinations() as $destination) {
            if ($destination instanceof Destination && $this->getName() === $destination->getChannel()) {
                return true;
            } elseif (is_string($destination) && $this->getName() === $destination) {
                return true;
            }
        }

        return false;
    }

    protected function getDestination(NotificationEvent $event)
    {
        foreach ($event->getDestinations() as $destination) {
            if ($destination instanceof Destination && $this->getName() === $destination->getChannel()) {
                return $destination;
            } elseif (is_string($destination) && $this->getName() === $destination) {
                return $destination;
            }
        }

        return false;
    }

    /**
     * @param NotificationEvent $event
     *
     * @return mixed
     */
    public function onNotification(NotificationEvent $event)
    {
        if (!$this->support($event)) {
            return false;
        }

        $subject = $event->getSubject();
        $types = $event->getTypes();
        $destination = $this->getDestination($event);

        /** @var NotificationBuilderInterface $builder */
        $builder = $this->factory->generateBuilder(get_class($subject));
        if (!$builder) {
            return false;
        }
        if ($types && is_array($types) && !empty($types)) {
            // If types define manage multiple type to custom notification build
            foreach ($types as $type) {
                /** @var Notification $notification */
                $notification = $builder->build($subject, $type, $destination);
                $this->manager->manage($notification);
            }
        } else {
            /** @var Notification $notification */
            $notification = $builder->build($subject, null, $destination);
            $this->manager->manage($notification);
        }
    }

    /**
     * @return string
     */
    abstract public function getName();
}
