<?php

namespace App\Repositories\Eloquent;

use App\Models\Rental;
use App\Repositories\Interfaces\RentalRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class RentalRepository implements RentalRepositoryInterface
{
    protected $rental;
    /**
     * Create a new class instance.
     */
    public function __construct(Rental $rental)
    {
        $this->rental = $rental;
    }

    public function getAll(): Collection
    {
        $rentals = $this->rental::with(['customer', 'rental_detail.book'])
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

    public function create($data): Rental
    {
        return $this->rental::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->rental::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->rental::destroy($id);
    }

    public function getById(int $id): ?Rental
    {
        return $this->rental::find($id);
    }

    public function getByUserId(int $id): Collection
    {
//        Rental::with('book')->where('user_id', $userId)->latest()->limit(5)->get();
        return $this->rental::with('book')->where('user_id', $id)->get();
    }

    public function getByCustomerId(int $id): Collection
    {
//        Rental::with('book')->where('customer_id', $id)->latest()->limit(5)->get();
        return $this->rental::with('book')->where('customer_id', $id)->get();
    }

    public function getByStatus($status): Collection
    {
        return $this->rental::where('status', $status)->get();
    }

    public function count():int
    {
        return $this->rental::count();
    }

    public function countActive(): int
    {
        return $this->rental::where('status', 'ongoing')->orWhere('status', 'overdue')->count();
    }
}

