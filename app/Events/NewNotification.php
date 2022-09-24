<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class NewNotification implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    // public $user_photo;
    public $user_name;
    public $user_id;
    public $project_id;
    public $notification_type;
    public $address;
    public $profile_picture;


    public function __construct($data)
    {
        // $this->user_photo = $data['user_photo'];
        $this->user_name = $data['user_name'];
        $this->user_id = $data['user_id'];
        $this->project_id = $data['project_id'];
        $this->notification_type = $data['notification_type'];
        $this->address = $data['address'];
        $this->profile_picture = $data['profile_picture'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('new-notification');
    }
}
