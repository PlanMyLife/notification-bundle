<?php

namespace PlanMyLife\NotificationBundle\EventListener;

class FlashBagNotificationListener extends NotificationListener implements NotificationListenerInterface
{
    public function getName()
    {
        return 'flash_bag';
    }
}
