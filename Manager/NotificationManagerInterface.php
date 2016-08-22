<?php

namespace PlanMyLife\NotificationBundle\Manager;

use PlanMyLife\NotificationBundle\Model\Notification;

interface NotificationManagerInterface
{
    public function manage(Notification $notification);
    public function checkParams(Notification $notification);
    public function requiredParams();
}
