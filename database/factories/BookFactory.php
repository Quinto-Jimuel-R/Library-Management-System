<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_code' => fake()->unique()->numberBetween(1, 9999999999),
            'title' => fake()->unique()->sentence(3),
            'author' => fake()->name(),
            'status' => fake()->randomElement(['Available', 'Reserved', 'Borrowed', 'Overdue', 'Lost']),
        ];
    }
}
