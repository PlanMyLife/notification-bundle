<?php

namespace PlanMyLife\NotificationBundle\EventListener;

class MailNotificationListener extends NotificationListener implements NotificationListenerInterface
{
    public function getName()
    {
        return 'mail';
    }
}
