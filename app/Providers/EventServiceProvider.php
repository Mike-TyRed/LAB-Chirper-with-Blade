<?php

namespace App\Providers;

use App\Events\ChirpCreated;
use App\Listeners\SendChirpCreatedNotifications;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
 
    //Enlazamos el listener al evento para que realice el envio del mensaje
    protected $listen = [
        ChirpCreated::class => [
            SendChirpCreatedNotifications::class,
        ],
        
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];
 
    public function boot()
    {
        //
    }
 
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
