<?php

namespace App\Notifications;

use App\Services\Firebase\Contracts\FcmNotifiable;
use App\Services\Firebase\FcmNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BadgeUpdateNotification extends Notification implements FcmNotifiable
{
    use Queueable;


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', \App\Notifications\Channels\FCMChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }



    /**
     * Prepare the FCM payload for the notification.
     *
     * @param  object  $notifiable
     * @return FcmNotification
     */
    public function toFcm(object $notifiable): FcmNotification
    {
        return new FcmNotification(
            $notifiable,
            $this
            ,
            [
                'badge_id'      => rand(100, 999),
                'icon'          => 'https://placehold.co/120x120',
                'type'          => 'badge_awarded'
            ]
        );
    }


    public function getMessage($notifiable = null)
    {
        return "Congratulations, You have received a silver badge, keep posting reviews and get more badges.";
    }
    
    public function getTitle($notifiable = null)
    {
        return "Congratulations, you have been awarded a silver badge!";
    }
    
}
