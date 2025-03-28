<?php

namespace App\Services;

use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Support\Facades\Log;

class CustomerService
{
    protected $customerRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll()
    {
        try {
            return $this->customerRepository->all();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function count()
    {
        try{
            return $this->customerRepository->count();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function getById($id)
    {
        try{
           return $this->customerRepository->getById($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function getByPhone($phone)
    {
        try{
            return $this->customerRepository->getByPhone($phone);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
