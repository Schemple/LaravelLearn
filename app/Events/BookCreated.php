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

class BookCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public Book $book;
    public $message;

    /**
     * Create a new event instance.
     */
    public function __construct(Book $book, $message)
    {
        $this->book = $book;
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
            new Channel('notify'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'new.book';
    }

    public function broadcastWith(): array
    {
        info('broad with');
        return [
            'message' => 'Sách mới đã được thêm!',
        ];
    }
}
