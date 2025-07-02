<?php

namespace App\Notifications\Channels;

use App\Models\FcmToken;
use App\Services\Firebase\Contracts\FcmNotifiable;
use Kreait\Firebase\Messaging;
use Illuminate\Notifications\Notification;

class FCMChannel
{
    protected Messaging $messaging;

    public function __construct(Messaging $messaging)
    {
        $this->messaging = $messaging;
    }

    public function send($notifiable, Notification $notification)
    {
        $tokens = $this->getFcmTokens($notifiable);

        if (empty($tokens)) {
            return;
        }

        if ($notification instanceof FcmNotifiable) {

            $fcm_notification = $notification->toFcm($notifiable);
            
            $message = Messaging\CloudMessage::fromArray(data: $fcm_notification->toArray());

            try {
                $this->messaging->sendMulticast($message, $tokens);
            } catch (\Exception $e) {
            }
        }

    }


    protected function getFcmTokens($notifiable)
    {
        return FcmToken::where('user_id', $notifiable->id)->pluck('token')->toArray();
    }
}
