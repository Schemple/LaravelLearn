<?php
namespace App\Schedule;

use App\Jobs\UpdateOverdueRentals;
use Illuminate\Console\Scheduling\Schedule;

class UpdateOverdueRentalsSchedule
{
    public function __invoke(Schedule $schedule)
    {
        $schedule->job(new UpdateOverdueRentals)->everyMinute();
    }
}
