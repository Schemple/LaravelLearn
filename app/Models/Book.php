<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    protected $fillable = ['title', 'author', 'published_year', 'stock'];
    public function rental_detail()
    {
        return $this->hasMany(Rental_detail::class);
    }
}
