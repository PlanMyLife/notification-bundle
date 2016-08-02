<?php

namespace PlanMyLife\NotificationBundle\Builder;

use PlanMyLife\NotificationBundle\Model\Notification;

class StdNotificationBuilder implements NotificationBuilderInterface
{
    public function build($target)
    {
        $notification = new Notification();
        $notification->setTitle($target->title);
        $notification->setContent($target->content);
        $notification->setType($target->type);
        $notification->setDate($target->date);
        $notification->setParams($target->params);

        return $notification;
    }
}
