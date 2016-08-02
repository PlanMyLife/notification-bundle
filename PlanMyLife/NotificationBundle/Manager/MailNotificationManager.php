<?php

namespace PlanMyLife\NotificationBundle\Manager;

use PlanMyLife\NotificationBundle\Model\Notification;

class MailNotificationManager implements NotificationManagerInterface
{
    /** @var  \Swift_Mailer */
    protected $mailer;

    /**
     * MailNotificationManager constructor.
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function manage(Notification $notification)
    {
        /** @var \Swift_Message $message */
        $message = $this->mailer->createMessage();
        $message->setDate($notification->getDate());
        $message->setSubject($notification->getTitle());
        $message->setBody($notification->getContent());
    }
}
