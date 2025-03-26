<?php

namespace App\Http\Controllers;

use App\Models\RentalDetail;
use Illuminate\Http\Request;

class RentalDetailController extends Controller
{
    public function rentedBooks()
    {
        $rentedBooks = RentalDetail::whereHas('rental', function ($query) {
            $query->where('status', 'ongoing')->orWhere('status', 'overdue');
        })->sum('quantity');
        return response()->json([
            'books_on_rent' => $rentedBooks
        ]);
    }
}
