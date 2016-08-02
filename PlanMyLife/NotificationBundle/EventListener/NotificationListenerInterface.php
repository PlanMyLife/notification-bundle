<?php

namespace PlanMyLife\NotificationBundle\EventListener;

use PlanMyLife\NotificationBundle\Event\NotificationEvent;

interface NotificationListenerInterface
{
    public function onNotification(NotificationEvent $event);

    public function support(NotificationEvent $event);

    public function getName();
}
