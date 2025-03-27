<?php

namespace App\Repositories\Interfaces;

use App\Models\Rental;
use Illuminate\Database\Eloquent\Collection;

interface RentalRepositoryInterface
{
    public function getAll(): Collection;

    public function create(array $data): Rental;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function getById(int $id): ?Rental;

    public function getByUserId(int $id): Collection;

    public function getByCustomerId(int $id): Collection;

    public function getByStatus($status): Collection;
}

