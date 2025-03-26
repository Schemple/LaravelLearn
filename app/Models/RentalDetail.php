<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalDetail extends Model
{
    /** @use HasFactory<\Database\Factories\RentalDetailFactory> */
    use HasFactory;
    protected $fillable = ['rental_id', 'book_id', 'quantity'];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
