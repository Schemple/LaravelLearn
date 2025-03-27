<?php

namespace App\Repositories\Eloquent;

use App\Models\Customer;
use App\Models\Rental;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository implements CustomerRepositoryInterface
{
    protected $customer;

    /**
     * Create a new class instance.
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getAll(): Collection
    {
        return $this->customer::all();
    }


    public function create(array $data): Customer
    {
        return $this->customer::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->customer::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->customer::destroy($id);
    }

    public function getById(int $id): ?Customer
    {
        return $this->customer::find($id);
    }

    public function getByPhone($phonenumber): ?Customer
    {
        return $this->customer::where('phone', $phonenumber)->get();
    }

    public function getByEmail($email): ?Customer
    {
        return $this->customer::where('email', $email)->get();
    }

    public function count(): int
    {
        return $this->customer::count();
    }
}
