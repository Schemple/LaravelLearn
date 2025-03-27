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
            return $this->customerRepository->getAll();
        } catch (\Exception $e) {
            Log::error('Lỗi truy xuất dữ liệu người dùng' . $e->getMessage());
            return false;
        }
    }

    public function count()
    {
        return $this->customerRepository->count();
    }

    public function getById($id)
    {
        try{
           return $this->customerRepository->getById($id);
        } catch (\Exception $e) {
            Log::error('Lỗi truy xuất dữ liệu người dùng theo ID' . $e->getMessage());
            return false;
        }
    }


}
