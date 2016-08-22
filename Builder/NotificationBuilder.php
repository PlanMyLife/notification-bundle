<?php
/**
 * User: blackreaven
 * Date: 22/08/2016
 * Time: 16:11
 */
namespace PlanMyLife\NotificationBundle\Builder;

use PlanMyLife\NotificationBundle\Model\Destination;
use PlanMyLife\NotificationBundle\Model\Notification;

class NotificationBuilder implements NotificationBuilderInterface
{
    protected function buildNotificationParam(Notification &$notification, $destination = null)
    {
        if ($destination instanceof Destination) {
            $notification->setParams($destination->getDestination());
        }
    }

    public  function build($target, $type = null, $destination = null)
    {
        throw new \Exception('Not implemented');
    }
}
