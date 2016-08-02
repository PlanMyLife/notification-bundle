<?php

namespace PlanMyLife\NotificationBundle\Factory;

interface NotificationBuilderFactoryInterface
{
    public function generateBuilder($class);
}
