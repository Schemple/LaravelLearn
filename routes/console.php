<?php

use Illuminate\Support\Facades\Schedule;
use App\Jobs\UpdateOverdueRentals;

Schedule::job(new UpdateOverdueRentals)->daily();
