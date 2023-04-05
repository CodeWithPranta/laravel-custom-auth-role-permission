<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostEvent>
 */
class PostEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>fake()->numberBetween(1, 10),
            'title' => fake()->sentence(3),
            'description' => fake()->sentences(10, true),
        ];
    }
}
