<?php

namespace App\Models;

use App\Observers\RentalObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([RentalObserver::class])]
class Rental extends Model
{
    /** @use HasFactory<\Database\Factories\RentalFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'customer_id', 'rental_date', 'due_date', 'return_date', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function rental_detail()
    {
        return $this->hasMany(Rental_detail::class);
    }
}
