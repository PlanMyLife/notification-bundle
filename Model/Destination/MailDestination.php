<?php
/**
 * User: blackreaven
 * Date: 22/08/2016
 * Time: 14:00
 */
namespace PlanMyLife\NotificationBundle\Model\Destination;

use PlanMyLife\NotificationBundle\Model\Destination;
use PlanMyLife\NotificationBundle\Model\DestinationInterface;

class MailDestination extends Destination implements DestinationInterface
{
    public function getChannel()
    {
        return 'mail';
    }
}
