<?php

namespace PlanMyLife\NotificationBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class NotificationCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('notification.event.dispatcher')) {
            return;
        }

        $definition = $container->findDefinition(
            'notification.event.dispatcher'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'notification.event_subscriber'
        );
        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                $definition->addMethodCall(
                    'addSubscriber',
                    array(new Reference($id), $attributes['event'])
                );
            }
        }
    }
}
