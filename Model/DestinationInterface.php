<?php

namespace PlanMyLife\NotificationBundle\Model;

interface DestinationInterface
{
    public function getChannel();
    public function getDestination();
}
