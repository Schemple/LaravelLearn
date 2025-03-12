<?php

use App\Models\Rental;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Jobs\UpdateOverdueRentals;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('report:daily-rentals {--date= : Ngày thống kê (YYYY-MM-DD, mặc định là hôm nay)}', function ($date=null) {
    if (!$date) {
        $date = now();
    } else {
        $date = Carbon\Carbon::parse($date);
    }
    $totalRentals = Rental::whereDate('rental_date', $date)->count();
    $this->info("Báo cáo thống kê ngày: {$date->toDateString()}");
    $this->info("Tổng đơn thuê: $totalRentals");
    return 0;
})->description('Thống kê số lượng đơn thuê sách trong ngày');
