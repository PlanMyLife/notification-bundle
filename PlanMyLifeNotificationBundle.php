<?php

namespace PlanMyLife\NotificationBundle;

use PlanMyLife\NotificationBundle\DependencyInjection\Compiler\NotificationCompilerPass;
use PlanMyLife\NotificationBundle\DependencyInjection\PlanMyLifeNotificationExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PlanMyLifeNotificationBundle extends Bundle
{
    public function getContainerExtension()
    {
        // return the right extension instead of "auto-registering" it. Now the
        // alias can be pml_notification instead of plan_my_life_notification..
        if (null === $this->extension) {
            return new PlanMyLifeNotificationExtension();
        }

        return $this->extension;
    }

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new NotificationCompilerPass());
    }
}
