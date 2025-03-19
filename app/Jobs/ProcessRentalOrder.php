<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Rental;

class ProcessRentalOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $rentalData;

    /**
     * Create a new job instance.
     */
    public function __construct($rentalData)
    {
        $this->rentalData = $rentalData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Rental::create($this->rentalData);
    }
}
