<?php

namespace Database\Factories;

use App\Models\Blog;
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
    public function definition()
    : array
    {
        return [
            'title'       => $this->faker->sentence,
            'description' => $this->faker->paragraph(rand(3, 10), true),
            'author_id'   => User::query()->first()->value('id'),
        ];
    }
}
