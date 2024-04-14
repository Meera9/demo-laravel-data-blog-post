<?php

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Blog;

if ( !function_exists('strLimit') ) {
    function strLimit($string, $limit = 20)
    {
        return Str::limit($string, $limit);
    }
}

if ( !function_exists('dateFormat') ) {
    function dateFormat($date, $format = 'Y-m-d H:i:s')
    {
        return Carbon::parse($date)->format($format);
    }
}

if ( !function_exists('dayDiff') ) {
    function dayDiff($date)
    {
        return Carbon::parse($date)->diffInDays(now());
    }
}

if ( !function_exists('activeCategories') ) {
    function activeCategories()
    {
        return Category::active()->pluck("title", "id");
    }
}

if ( !function_exists('activeBlogs') ) {
    function activeBlogs()
    {
        return Blog::query()->whereHas('categories')->pluck("title", "id");
    }
}

if ( !function_exists('authorId') ) {
    function authorId()
    {
        return auth()->check() ? auth()->id() : User::query()->first()->value('id');
    }
}

if ( !function_exists('relatedPosts') ) {
    function relatedPosts($postId)
    {
        $post = Post::query()->where('id', $postId)->first();

        if ( !blank($post) && $post->blog && $post->blog->categories->count() > 0 ) {
            return Post::query()->inRandomOrder()->whereIn('id', $post->blog->categories->pluck('id'))->limit(6)->get();
        }

        return [];
    }
}
