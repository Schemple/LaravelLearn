<?php

namespace App\Events;

use App\Models\Book;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewBook implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public Book $rental;

    /**
     * Create a new event instance.
     */
    public function __construct($message)
    {
        if ($message) {
            $this->message = $message;
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('testChannel'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'book.added';
    }

    public function broadcastWith(): array
    {
        info('broad with');
        return [
            'message' => 'Dữ liệu mới đã được tạo!',
        ];
    }
}
