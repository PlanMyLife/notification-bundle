<?php

namespace PlanMyLife\NotificationBundle\Builder;

interface NotificationBuilderInterface
{
    /**
     * Build a notification model from target object and with type
     * @param $target
     * @param mixed $type
     * @param mixed $destination
     * @return mixed
     */
    public function build($target, $type = null, $destination = null);
}
