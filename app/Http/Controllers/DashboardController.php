<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Services\RentalService;

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
//        return response()->json($this->rentalService->all());
        return $this->rentalService->countActive();
    }

    public function index()
    {
        $rentalNum = $this->rentalService->count();
        $activeRentalNum = $this->rentalService->countActive();
        $customerNum = $this->customerService->count();
        $rentals = $this->rentalService->getDashboardInfo();

        return view('dashboard.index', [
            'activeRentalNum' => $activeRentalNum,
            'rentalNum' => $rentalNum,
            'customerNum' => $customerNum,
            'rentals' => $rentals,
        ]);
    }
}
