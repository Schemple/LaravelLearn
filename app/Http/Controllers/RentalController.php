<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Jobs\ProcessRentalOrder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RentalImport;
use App\Http\Controllers\RentalDetailController;

class RentalController extends Controller
{
    public function import()
    {
//        Excel::import(new RentalImport, 'orders.xlsx');
        $collection = Excel::toCollection(new RentalImport, 'orders.xlsx');
        dd($collection);
//        return redirect('/')->with('success', 'All good!');
    }

    public static function rentedBooks()
    {
        return null;
    }
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

    public function create(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after:rental_date',
        ]);
        ProcessRentalOrder::dispatch($data);
        return response()->json(['message' => 'Đơn thuê sách đã được tiếp nhận xử lý'], 201);
    }
}
