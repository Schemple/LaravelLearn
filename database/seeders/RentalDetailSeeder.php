<?php

namespace Database\Seeders;

use App\Models\RentalDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RentalDetail::factory()->count(5)->create([
            'rental_id' => fake()->numberBetween(1, 5),
            'book_id' => fake()->numberBetween(1, 20),
        ]);
    }
}
