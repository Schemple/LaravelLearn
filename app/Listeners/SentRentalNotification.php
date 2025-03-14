<?php

namespace App\Listeners;

use App\Events\NewRental;
use App\Events\RentalDelete;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SentRentalNotification
{
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
    public function handle(NewRental|RentalDelete $event): void
    {
        info("Notification triggered");
    }
}
