<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition(): array
    {
        return [
            'author_id' => User::pluck('id')->random(),
            'title' => fake()->words(rand(3, 5), true),
            'description' => fake()->paragraph(),
            'published_at' => fake()->randomElement([fake()->dateTimeBetween('2000-01-01', '2005-12-31')->format('Y-m-d'), null]),
        ];
    }
}
