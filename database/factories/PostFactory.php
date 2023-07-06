<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(),
            'user_id' => fake()->numberBetween(1, 500),
            'karma' => fake()->numberBetween(1, 1000),
            'subduckkit_id' => fake()->numberBetween(1, 50),
        ];
    }
}
