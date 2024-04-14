<?php

namespace App\Http\Controllers;

use App\Data\BlogData;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        view()->share('blogs', BlogData::collect(Blog::query()->whereHas('categories')->latest()->limit(3)->get()));
        return view('home');
    }
}
