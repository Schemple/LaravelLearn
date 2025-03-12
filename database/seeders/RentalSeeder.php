<?php

namespace Database\Seeders;

use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rental::factory()->count(5)->create([
            'customer_id' => fake()->numberBetween(1, 5),
            'user_id' => fake()->numberBetween(1, 3),
            'rental_date' => Carbon::today()->format('Y-m-d'),
            'due_date' =>Carbon::yesterday()->format('Y-m-d'),
            'status' => 'ongoing'
        ]);

    }
}
