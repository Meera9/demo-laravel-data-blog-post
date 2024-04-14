<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Post;
use App\Models\Comment;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    : void
    {
        Blog::factory()->count(10)->create()->each(function ($blog) {
            $blog->categories()->sync(Category::query()->inRandomOrder()->limit(2)->pluck("id"));
            $blog->posts()->saveMany(Post::factory()->count(10)->create(['blog_id' => $blog->id])->each(function ($post) {
                $post->comments()->saveMany(Comment::factory()->count(rand(1, 5))->make());
            }));
        });
    }
}
