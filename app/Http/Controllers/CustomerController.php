<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Services\RentalService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private CustomerService $customerService;
    private RentalService $rentalService;
    public function __construct(CustomerService $customerService, RentalService $rentalService)
    {
        $this->customerService = $customerService;
        $this->rentalService = $rentalService;
    }
    public function all()
    {
        return $this->customerService->getAll();
    }

//    public function getRentals($id)
//    {
//        return $this->rentalService->getRentals($id);
//    }
}
