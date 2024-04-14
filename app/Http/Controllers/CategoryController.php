<?php

namespace App\Http\Controllers;

use App\Data\CategoryData;
use App\Models\Category;

class CategoryController extends Controller
{
    private $with = ['blogs', 'blogs.comments'];


    public function show($id)
    {
        $entity = CategoryData::from(Category::query()->with($this->with)->findOrFail($id));

        return view('categories.show', compact('entity'));
    }
}
