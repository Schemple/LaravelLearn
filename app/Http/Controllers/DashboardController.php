<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Services\CustomerService;
use App\Services\RentalService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private CustomerService $customerService;
    private RentalService $rentalService;

    public function __construct(CustomerService $customerService, RentalService $rentalService)
    {
        $this->customerService = $customerService;
        $this->rentalService = $rentalService;
    }

    public function test()
    {
        return response()->json($this->rentalService->all());
    }

    public function index()
    {
        $rentalNum = $this->rentalService->count();
        $activeRentalNum = $this->rentalService->countActive();
        $customerNum = $this->customerService->count();
        $rentals = $this->rentalService->all();

        return view('dashboard.index', [
            'activeRentalNum' => $activeRentalNum,
            'rentalNum' => $rentalNum,
            'customerNum' => $customerNum,
            'rentals' => $rentals,
        ]);
    }
}
