# Notification Bundle

The notification bundle was created for the planmylife.io to manage all notifications. Have fun with it.

## Installation

### Step 1: Download the Bundle

	composer require planmylife/notification-bundle

This command requires you to have Composer installed globally, as explained in the Composer documentation.

### Step 2: Enable the Bundle

``` php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new PlanMyLife\NotificationBundle\PlanMyLifeNotificationBundle(),
        );
    }

    // ...
	}
```


### Step 3: Configure factory and builder

``` yaml
# app/config/routing.yml
pml_notification:
    factory: '@notification.factory'
    builders:
        std:
            class: stdClass
            builder: PlanMyLife\NotificationBundle\Builder\StdNotificationBuilder
        user:
        	class: Acme\MainBundle\Entity\User
            builder: Acme\MainBundle\Builder\UserNotificationBuilder
```

### Step 4: Add your builders classes

``` php
	<?php

	namespace Acme\MainBundle\Builder;

	use Acme\MainBundle\Entity\User;
	use PlanMyLife\NotificationBundle\Model\Notification;

	class UserNotificationBuilder implements NotificationBuilderInterface
	{
	    /**
	     * @param User $target
	     * @param mixed $type
	     * @return Notification
	     */
	    public function build($target, $type = null)
	    {
	        $notification = new Notification();
	        $notification->setTitle($target->getName());
	        $notification->setContent('user notification content example');
	        $notification->setType('[add type here]'); // log, notice, info, warning, error, critical
	        $notification->setDate($target->getCreatedAt()); 
	        $notification->setParams([
	            'email' => $target->getEmail(), # Params for mailer manager
	            'username' => $target->getUsername(), # Params for mailer/slack manager
	            'channel' => 'notification' # Params for slack manager
	            'template' => "Acme:Notification:$type.txt.twig"
	        ]);

	        return $notification;
	    }
	}
```

## Additionnal manager

### Step 1 : Define Manager class

``` php
	<?php

	namespace PlanMyLife\NotificationBundle\Manager;

	use PlanMyLife\NotificationBundle\Model\Notification;
	use Symfony\Component\HttpFoundation\Session\Session;

	class FlashBagNotificationManager implements NotificationManagerInterface
	{
	    /** @var  Session */
	    protected $session;

	    /**
	     * FlashBagNotificationManager constructor.
	     * @param Session $session
	     */
	    public function __construct(Session $session)
	    {
	        $this->session = $session;
	    }

	    public function manage(Notification $notification)
	    {
	        $this->session->getFlashBag()->add($notification->getType(), $notification->getContent());
	    }
	}
```

### Step 2 : Define your manager service

``` yaml
services:
    notification.manager.flash_bag:
    class: PlanMyLife\NotificationBundle\Manager\FlashBagNotificationManager
    arguments:
        - "@session"
```
### Step 3 : Define your listener 

``` php
<?php

namespace PlanMyLife\NotificationBundle\EventListener;

class FlashBagNotificationListener extends NotificationListener implements NotificationListenerInterface
{
    public function getName()
    {
        return 'flash_bag';
    }
}
```

### Step 4 : Bind your listener
	
``` yaml
services:
    notification.listener.flash_bag:
        class: PlanMyLife\NotificationBundle\EventListener\FlashBagNotificationListener
        arguments:
            - "%pml_notification.factory%"
            - "@notification.manager.flash_bag"
        tags:
            - { name: notification.event_subscriber, event: pml.notification }
```

### Step 5 : Test your notification

``` php
$object = new stdClass();
$object->title = 'Test title';
$object->content = 'Test Content';
$object->type = 'success';
$object->date = new \DateTime();
$object->params = [];
$this->get('notification.service')->notify($object, ['flash_bag'])
```

