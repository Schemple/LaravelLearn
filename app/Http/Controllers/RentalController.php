<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RentalController extends Controller
{
    public function all()
    {
//        $today = Carbon::today();
        $today = now();

//        $data = DB::table('rentals')->where('status', 'ongoing')->get();

        $data = Rental::whereDate('rental_date', $today)->count();
//        $data = DB::table('rentals')->where('status', 'ongoing')
//            ->whereDate('due_date', '<', $today)
//            ->update(['status'=>'overdue']);
        return response()->json($data);
    }
}
