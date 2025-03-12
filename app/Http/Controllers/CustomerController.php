<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function all()
    {
        return response()->json(Customer::all());
    }

    public function rentals($id)
    {
        return response()->json(Customer::find($id)->rentals);
    }
}
