<?php

namespace App\Listeners;

use App\Events\BookCreated;
use App\Models\User;
use App\Notifications\BookNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SentBookNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookCreated $event): void
    {
//        info("Notification triggered");
//        $user = User::find($event->rental->user_id);
//        if ($user){
//            Notification::send($user, new BookNotification($event->book));
//        }
    }
}
