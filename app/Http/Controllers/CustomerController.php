<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Services\RentalService;

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

    public function test()
    {
        return $this->customerService->getByPhone('1-252-934-9234');
    }

    public function rentals($id)
    {
        return $this->rentalService->getDetailByCustomerId($id);
    }
}
