<?php

namespace App\Console\Commands;

use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DailyRental extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:daily-rentals {--date= : Ngày thống kê (YYYY-MM-DD, mặc định là hôm nay)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Thống kê số lượng đơn thuê sách trong ngày';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = Carbon::parse($this->option('date')) ?? now();
        $totalRentals = Rental::whereDate('rental_date', $date)->count();
        $this->info("Báo cáo thống kê ngày: {$date->toDateString()}");
        $this->info("Tổng đơn thuê: $totalRentals");
        return 0;
    }
}
