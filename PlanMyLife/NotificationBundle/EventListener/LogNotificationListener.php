<?php

namespace PlanMyLife\NotificationBundle\EventListener;

use PlanMyLife\NotificationBundle\Builder\NotificationBuilderInterface;
use PlanMyLife\NotificationBundle\Event\NotificationEvent;
use PlanMyLife\NotificationBundle\Model\Notification;

class LogNotificationListener extends NotificationListener implements NotificationListenerInterface
{
    public function getName()
    {
        return 'log';
    }
}
