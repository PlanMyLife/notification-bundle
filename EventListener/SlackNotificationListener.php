<?php

namespace PlanMyLife\NotificationBundle\EventListener;

class SlackNotificationListener extends NotificationListener implements NotificationListenerInterface
{
    public function getName()
    {
        return 'slack';
    }
}
