<?php

namespace App\Http\Controllers;

use App\Data\BlogData;
use App\Models\Blog;

class BlogController extends Controller
{

    private $with = ['posts', 'comments', 'categories'];

    public function index()
    {
        $entities = BlogData::collect(Blog::query()->with($this->with)->get());

        return view('blogs.index', compact('entities'));
    }

    public function show($id)
    {
        $entity = BlogData::from(Blog::query()->with(['categories', 'posts', 'posts.comments', 'author'])->findOrFail($id));

        return view('blogs.show', compact('entity'));
    }
}
