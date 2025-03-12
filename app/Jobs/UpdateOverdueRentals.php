<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Rental;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateOverdueRentals implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $today = Carbon::today();

        $overdueRentals = Rental::where('status', 'ongoing')
            ->whereDate('due_date', '<', $today)
            ->update(['status'=>'overdue']);
        if ($overdueRentals) {
            Log::info("Cập nhật $overdueRentals đơn thuê quá hạn.");
        } else {
            Log::info("Không có đơn thuê nào quá hạn.");
        }
        Log::info("OKAY");
    }
}
