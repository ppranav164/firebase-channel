<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;
use App\Notifications\Channels\FCMChannel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->singleton(FCMChannel::class, function ($app) {
            $firebase = (new Factory)
                ->withServiceAccount(config('services.firebase.credentials'))
                ->createMessaging();
    
            return new FCMChannel($firebase);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
