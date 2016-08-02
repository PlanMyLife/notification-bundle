<?php

namespace PlanMyLife\NotificationBundle\EventListener;

use PlanMyLife\NotificationBundle\Builder\NotificationBuilderInterface;
use PlanMyLife\NotificationBundle\Event\NotificationEvent;
use PlanMyLife\NotificationBundle\Factory\NotificationBuilderFactoryInterface;
use PlanMyLife\NotificationBundle\Manager\NotificationManagerInterface;
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
        if (in_array($this->getName(), $event->getChannels())) {
            return true;
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
        /** @var NotificationBuilderInterface $builder */
        $builder = $this->factory->generateBuilder(get_class($subject));
        /** @var Notification $notification */
        $notification = $builder->build($subject);

        $this->manager->manage($notification);
    }

    /**
     * @return string
     */
    abstract public function getName();
}
