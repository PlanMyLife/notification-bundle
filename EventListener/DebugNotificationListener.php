<?php

namespace PlanMyLife\NotificationBundle\EventListener;

class DebugNotificationListener extends NotificationListener implements NotificationListenerInterface
{
    public function getName()
    {
        return 'debug';
    }
}
