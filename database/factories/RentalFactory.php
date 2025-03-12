<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rental_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'return_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['ongoing', 'returned', 'overdue']),
        ];
    }
}
