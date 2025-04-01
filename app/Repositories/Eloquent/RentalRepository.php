<?php

namespace App\Repositories\Eloquent;

use App\Models\Rental;
use App\Repositories\Interfaces\RentalRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class RentalRepository extends BaseRepository implements RentalRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Rental::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getRentalDetails(): Collection
    {
        $rentals = $this->model()::with(['customer', 'rental_detail.book'])
            ->get()
            ->flatMap(function ($rental) {
                return $rental->rental_detail->map(function ($detail) use ($rental) {
                    return [
                        'customer_name' => $rental->customer->name,
                        'book_title' => $detail->book->title,
                        'status' => $rental->status,
                        'rental_date' => $rental->rental_date,
                        'due_date' => $rental->due_date,
                    ];
                });
            });

        return new Collection($rentals);
    }

    public function countActive(): int
    {
        return $this->count(['status' => 'ongoing'])
            + $this->count(['status' => 'overdue']);
    }

    public function getDetailsByCustomerId($id): Collection
    {
        $rentals = $this->model()::with(['customer', 'rental_detail.book'])
            ->where('customer_id', $id)
            ->get()
            ->flatMap(function ($rental) {
                return $rental->rental_detail->map(function ($detail) use ($rental) {
                    return [
                        'customer_name' => $rental->customer->name,
                        'book_title' => $detail->book->title,
                        'status' => $rental->status,
                        'rental_date' => $rental->rental_date,
                        'due_date' => $rental->due_date,
                    ];
                });
            });

        return new Collection($rentals);
    }
}

