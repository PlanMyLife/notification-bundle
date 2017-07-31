<?php
/**
 * User: blackreaven
 * Date: 16/08/2016
 * Time: 11:34
 */
namespace PlanMyLife\NotificationBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class NotificationBuilderCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasParameter('pml_notification.builders')) {
            return;
        }

        $builders = $container->getParameter('pml_notification.builders');
        foreach ($builders as $key => $builder) {
            $arguments = [];
            foreach ($builder['arguments'] as $arg) {
                if(preg_match('/^@(.*)/',$arg,$matches)){
                    // service
                    $arguments[] = new Reference($matches[1]);
                }
            }

            $definition = new Definition($builder['builder'], $arguments);
            $container->addDefinitions(['pml_notification.builders.' . $key => $definition]);
        }
    }
}
