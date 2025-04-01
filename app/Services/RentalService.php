<?php

namespace App\Services;

use App\Models\Rental;
use App\Repositories\Interfaces\RentalRepositoryInterface;
use Illuminate\Support\Facades\Log;

class RentalService
{
    protected RentalRepositoryInterface $rentalRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(RentalRepositoryInterface $rentalRepository)
    {
        $this->rentalRepository = $rentalRepository;
    }

    public function all()
    {
        try{
            return $this->rentalRepository->all();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function create(array $data)
    {
        try{
            return $this->rentalRepository->create($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function update(array $data, int $id)
    {
        try{
            return $this->rentalRepository->update($data, $id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function delete(int $id)
    {
        try{
            return $this->rentalRepository->delete($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function getRentalDetails()
    {
        try{
            return $this->rentalRepository->getRentalDetails();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function count()
    {
        try{
            return $this->rentalRepository->count();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function countActive()
    {
        try{
            return $this->rentalRepository->countActive();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public function getDetailByCustomerId(int $customerId)
    {
        return $this->rentalRepository->getDetailsByCustomerId($customerId);
    }
}
