<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Jobs\ProcessRentalOrder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RentalImport;

class RentalController extends Controller
{

//    public function import()
//    {
//        Excel::import(new RentalImport, 'orders.xlsx');
//        $collection = Excel::toCollection(new RentalImport, 'orders.xlsx');
//        dd($collection);
//    }

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
