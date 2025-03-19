<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    protected $fillable = ['title', 'author', 'published_year', 'stock', 'cover'];

    public function getCoverUrlAttribute()
    {
        return $this->cover ? asset($this->cover) : asset('images/default-book.png');
    }

    public function rental_detail()
    {
        return $this->hasMany(RentalDetail::class);
    }
}
