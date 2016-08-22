<?php

namespace PlanMyLife\NotificationBundle\Factory;

use PlanMyLife\CoreBundle\Entity\Event;
use PlanMyLife\NotificationBundle\Builder\EventNotificationBuilder;
use PlanMyLife\NotificationBundle\Builder\NewsletterNotificationBuilder;
use PlanMyLife\NotificationBundle\Builder\NotificationBuilderInterface;
use PlanMyLife\NotificationBundle\Builder\StdNotificationBuilder;

class NotificationBuilderFactory implements NotificationBuilderFactoryInterface
{
    /** @var  array */
    protected $builders;

    /**
     * NotificationBuilderFactory constructor.
     * @param array $builders
     */
    public function __construct(array $builders)
    {
        $this->builders = $builders;
    }

    /**
     * @param $class
     *
     * @return boolean|NotificationBuilderInterface
     */
    public function generateBuilder($class)
    {
        foreach ($this->builders as $builder) {
            if ($builder['class'] === $class) {
                return new $builder['builder']();
            }
        }

        return false;
    }
}
