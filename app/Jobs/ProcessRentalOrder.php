<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\RentalService;
class ProcessRentalOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private RentalService $rentalService;
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
    public function handle(RentalService $rentalService): void
    {
        info('a');
        $rentalService->create($this->rentalData);
    }
}
