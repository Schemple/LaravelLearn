<?php

namespace App\Services;

use App\Repositories\Interfaces\RentalRepositoryInterface;

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
        return $this->rentalRepository->getAll();
    }

    public function count()
    {
        return $this->rentalRepository->count();
    }

    public function countActive()
    {
        return $this->rentalRepository->countActive();
    }

    public function getByCustomerId($user_id)
    {
        return $this->rentalRepository->getByCustomerId($user_id);
    }
}
