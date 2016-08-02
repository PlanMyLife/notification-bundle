<?php

namespace PlanMyLife\NotificationBundle\Manager;

use PlanMyLife\NotificationBundle\Model\Notification;

class DebugNotificationManager implements NotificationManagerInterface
{
    /** @var  string */
    protected $appEnv;

    /**
     * DebugNotificationManager constructor.
     * @param string $appEnv
     */
    public function __construct($appEnv)
    {
        $this->appEnv = $appEnv;
    }


    public function manage(Notification $notification)
    {
        if ($this->appEnv === 'dev') {
            dump($notification);
        }
    }
}
