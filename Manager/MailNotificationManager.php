<?php

namespace PlanMyLife\NotificationBundle\Manager;

use PlanMyLife\NotificationBundle\Model\Notification;

class MailNotificationManager extends NotificationManager implements NotificationManagerInterface
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
        if ($this->checkParams($notification)) {
            /** @var \Swift_Message $message */
            $message = $this->mailer->createMessage();
            if ($notification->getDate() instanceof \DateTime) {
                $message->setDate($notification->getDate()->getTimestamp());
            }
            $message->setSubject($notification->getTitle());
            $message->setBody($notification->getContent());
            $message->setFrom($notification->getParam('from'));
            $message->setTo($notification->getParam('to'));
            $message->setContentType($notification->getParam('content-type'));

            $this->mailer->send($message);
        }
    }

    public function requiredParams()
    {
        return ['from', 'to', 'content-type'];
    }
}
