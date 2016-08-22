<?php

namespace PlanMyLife\NotificationBundle\Factory;

use PlanMyLife\CoreBundle\Entity\Event;
use PlanMyLife\NotificationBundle\Builder\EventNotificationBuilder;
use PlanMyLife\NotificationBundle\Builder\NewsletterNotificationBuilder;
use PlanMyLife\NotificationBundle\Builder\NotificationBuilderInterface;
use PlanMyLife\NotificationBundle\Builder\StdNotificationBuilder;
use Symfony\Component\DependencyInjection\Container;

class NotificationBuilderFactory implements NotificationBuilderFactoryInterface
{
    /** @var  array */
    protected $builders;
    /** @var  Container */
    protected $container;

    /**
     * NotificationBuilderFactory constructor.
     * @param array $builders
     */
    public function __construct(array $builders, $container)
    {
        $this->builders = $builders;
        $this->container = $container;
    }

    /**
     * @param $class
     *
     * @return boolean|NotificationBuilderInterface
     */
    public function generateBuilder($class)
    {
        foreach ($this->builders as $key => $builder) {
            if ($builder['class'] === $class) {
                return $this->container->get('pml_notification.builders.'.$key);
            }
        }

        return false;
    }
}
