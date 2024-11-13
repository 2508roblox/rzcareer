<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $invitation_code;
    public $customer_id;

    public function __construct($data)
    {
        $this->invitation_code = $data['invitation_code'];
        $this->customer_id = $data['customer_id'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('notification');
    }
    public function broadcastAs()
    {
        return 'notification.' . $this->customer_id;
    }

    public function broadcastWith(): array
    {
        return [
            'invitation_code' => $this->invitation_code,
            'customer_id' => $this->customer_id
        ];
    }
}
