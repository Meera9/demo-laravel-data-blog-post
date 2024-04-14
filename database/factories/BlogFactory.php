<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    : array
    {
        $title = $this->faker->sentence;
        return [
            'title'       => $title,
            'description' => $this->faker->paragraph,
            'author_id'   => User::query()->first()->value('id'),
            'slug'        => Str::slug($title),
        ];
    }
}
