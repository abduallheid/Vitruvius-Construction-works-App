<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewContractorNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // $contractors = User::whereHas('kind', function ($query) {
        //         $query->where('kind', "contractor");
        //     })->get();

        // Notification::send($contractors, new NewUserNotification($event->user));
    }
}
