<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Notifications\MessageRequest;
use Illuminate\Queue\InteractsWithQueue;

class NotificationListener
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
        //
        $when = now()->addMinutes(10);
        User::findOrFail($event->userId)
        ->notify((new MessageRequest($event->data))->delay($when));

    }
}
