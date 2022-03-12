<?php

namespace App\Providers;

use App\Mail\LoginCredentials;
use App\Providers\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendLoginCredentials
{

    /**
     * Handle the event.
     *
     * @param  \App\Providers\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        // enviar email con las credenciales del login
        Mail::to($event->user)->queue(
            new LoginCredentials($event->user, $event->password)
        );
    }
}
