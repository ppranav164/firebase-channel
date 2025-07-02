<?php

namespace App\Services\Firebase\Contracts;

use App\Services\Firebase\FcmNotification;

interface FcmNotifiable
{
    /**
     * Prepare the FCM payload for the notification.
     *
     * @param  object  $notifiable
     * 
     * @return FcmNotification
     */
    public function toFcm(object $notifiable): FcmNotification;

    public function getMessage($notifiable = null);

    public function getTitle($notifiable = null);
}
