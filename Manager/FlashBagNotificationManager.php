<?php

namespace PlanMyLife\NotificationBundle\Manager;

use PlanMyLife\NotificationBundle\Model\Notification;
use Symfony\Component\HttpFoundation\Session\Session;

class FlashBagNotificationManager extends NotificationManager implements NotificationManagerInterface
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
