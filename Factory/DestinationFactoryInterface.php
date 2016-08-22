<?php
/**
 * User: blackreaven
 * Date: 22/08/2016
 * Time: 13:51
 */
namespace PlanMyLife\NotificationBundle\Factory;

interface DestinationFactoryInterface
{
    public function generateDestination($channel, $param);
}
