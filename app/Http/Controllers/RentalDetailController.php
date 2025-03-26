<?php

namespace App\Http\Controllers;

use App\Models\RentalDetail;
use Illuminate\Http\Request;

class RentalDetailController extends Controller
{
    public static function rentedBookNum()
    {
        $rentedBooks = RentalDetail::whereHas('rental', function ($query) {
            $query->where('status', 'ongoing')->orWhere('status', 'overdue');
        })->sum('quantity');
        return $rentedBooks;
    }
}
