<?php

namespace PlanMyLife\NotificationBundle\Manager;

use CL\Slack\Payload\ChatPostMessagePayload;
use CL\Slack\Transport\ApiClient;
use PlanMyLife\NotificationBundle\Model\Notification;

class SlackNotificationManager implements NotificationManagerInterface
{
    /** @var  ApiClient */
    protected $slack;

    /**
     * SlackNotificationManager constructor.
     * @param ApiClient $slack
     */
    public function __construct(ApiClient $slack)
    {
        $this->slack = $slack;
    }


    public function manage(Notification $notification)
    {
        $params = $notification->getParams();
        if (is_array($params) && array_key_exists('channel', $params)) {
            $payload = new ChatPostMessagePayload();
            $payload->setChannel($params['channel']);
            $payload->setText($notification->getContent());
            $payload->setUsername('planmylife');
            
            // no connection will be made by using the mocked client,
            // it will simply create the proper response for this payload,
            // in this case an instance of ChatPostMessagePayloadResponse,
            // and fill it with some sensible data.
            $response = $this->slack->send($payload);
        }
    }
}
