<?php

namespace App\Events;

use App\Models\Rental;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewRental implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public Rental $rental;
    public $message;
    /**
     * Create a new event instance.
     */
    public function __construct($message)
    {
        info('new rental');
//        Rental $rental
//        $this->rental = $rental;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        info('broad on');
        return [
            new Channel('new-rental'),
        ];
    }

    public function broadcastAs(): string
    {
        info('broad as');
        return 'new-rent';
    }

    public function broadcastWith(): array
    {
        info('broad with');
        return [
            'message' => 'Dữ liệu mới đã được tạo!',
            'rental' => $this->rental,
        ];
    }
}
