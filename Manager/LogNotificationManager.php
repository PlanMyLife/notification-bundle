<?php

namespace PlanMyLife\NotificationBundle\Manager;

use Monolog\Logger;
use PlanMyLife\NotificationBundle\Model\Notification;

class LogNotificationManager implements NotificationManagerInterface
{
    /** @var  Logger */
    protected $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function manage(Notification $notification)
    {
        $this->logger->log($notification->getType(), $notification->getContent());
    }
}
