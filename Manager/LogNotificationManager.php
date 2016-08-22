<?php

namespace PlanMyLife\NotificationBundle\Manager;

use Monolog\Logger;
use PlanMyLife\NotificationBundle\Model\Notification;

class LogNotificationManager extends NotificationManager implements NotificationManagerInterface
{
    /** @var  Logger */
    protected $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function manage(Notification $notification)
    {
        if ($this->checkParams($notification)) {

            $this->logger->log($notification->getType(), $notification->getContent());
        }
    }
}
