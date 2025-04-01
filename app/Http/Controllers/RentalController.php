<?php

namespace App\Http\Controllers;

use App\Services\RentalService;
use Illuminate\Http\Request;
use App\Jobs\ProcessRentalOrder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RentalImport;

class RentalController extends Controller
{
    private RentalService $rentalService;
    public function __construct(RentalService $rentalService)
    {
        $this->rentalService = $rentalService;
    }
    public function all()
    {
        return $this->rentalService->all();
    }

    public function import()
    {
        Excel::import(new RentalImport, 'orders.xlsx');
        $collection = Excel::toCollection(new RentalImport, 'orders.xlsx');
        dd($collection);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after:rental_date',
        ]);
        info('?');
//        ProcessRentalOrder::dispatch($data);
        dispatch(new ProcessRentalOrder($data));
        return response()->json(['message' => 'Đơn thuê sách đã được tiếp nhận xử lý'], 201);
    }
}
