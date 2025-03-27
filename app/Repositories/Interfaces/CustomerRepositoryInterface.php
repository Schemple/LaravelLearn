<?php

namespace App\Repositories\Interfaces;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

interface CustomerRepositoryInterface
{
    public function getAll(): Collection;

    public function create(array $data): Customer;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function getById(int $id): ?Customer;

    public function getByPhone($phonenumber): ?Customer;

    public function getByEmail($email): ?Customer;
}

