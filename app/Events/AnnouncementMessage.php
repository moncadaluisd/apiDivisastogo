<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AnnouncementMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets;

    /*
    *Get info aboutt AnnouncementMessage
    * @var true
    */

    public $chatId;
    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($chatId, $message)
    {
        //
        $this->chatId =  $chatId;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->chatId);
    }
}
