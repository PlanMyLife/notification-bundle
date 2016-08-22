<?php

namespace PlanMyLife\NotificationBundle\Manager;

use PlanMyLife\NotificationBundle\Model\Notification;

class NotificationManager implements NotificationManagerInterface
{
    /**
     * @param Notification $notification
     * @return bool
     */
    public function checkParams(Notification $notification)
    {
        foreach ($this->requiredParams() as $key) {
            if (!$notification->hasParam($key)) {
                return false;
            }
        }
        return true;
    }

    public function manage(Notification $notification)
    {
        throw new \Exception('Not implemented');
    }

    /**
     * @return array
     */
    public function requiredParams()
    {
        return [];
    }
}
