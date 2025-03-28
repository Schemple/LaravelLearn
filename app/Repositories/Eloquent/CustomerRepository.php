<?php

namespace App\Repositories\Eloquent;

use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    public function model()
    {
        return Customer::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getById($id): Collection
    {
        return $this->find($id);
    }

    public function getByPhone($phonenumber): Collection
    {
        return $this->findByField('phone', $phonenumber);
    }

    public function getByEmail($email): Collection
    {
        return $this->findByField('email', $email);
    }
}
