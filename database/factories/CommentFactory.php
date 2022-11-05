<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body' => fake()->text(),
            'user_id' => fake()->numberBetween(1, 500),
            'duck' => fake()->numberBetween(0, 1000),
            'post_id' => fake()->numberBetween(1, 500),
            'parent_comment_id' => fake()->numberBetween(1, 500),
        ];
    }

    public function topLevel()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_comment_id' => null,
            ];
        });
    }

    public function deleted()
    {
        return $this->state(function (array $attributes) {
            return [
                'body' => '',
            ];
        });
    }
}
