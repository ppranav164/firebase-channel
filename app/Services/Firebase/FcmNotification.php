<?php

namespace App\Services\Firebase;

use App\Services\Firebase\Contracts\FcmNotifiable;


class FcmNotification
{
    public string $token;
    public FcmNotifiable $notification;
    public array $data;

    protected $notifiable;

    /**
     * Constructor for FCM Notification
     */
    public function __construct(object $notifiable, FcmNotifiable $notification, array $data = [])
    {
        $this->notifiable   = $notifiable;
        $this->notification = $notification;
        $this->token        = $this->notifiable->routeNotificationForFcm();
        $this->data         = $data;
    }

    /**
     * Convert the FCM notification into an array for Firebase messaging.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'token'        => $this->token,
            'notification' => [
                'title' => $this->notification->getTitle(),
                'body'  => $this->notification->getMessage(),
            ],
            'data'         => $this->data,
        ];
    }
}