<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $blogs = Blog::query()->whereHas('categories')->count();

        $posts = Post::query()->whereHas('blog')->count();

        return view('admin.dashboard', compact('blogs', 'posts'));
    }
}
