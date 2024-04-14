<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use App\Data\CategoryData;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $entities = CategoryData::collect(Category::query()->orderByDesc('id')->paginate(10));

        return view('admin.categories.index', compact('entities'));
    }

    public function create()
    {
        return view('admin.categories.form');
    }

    public function edit(Category $category)
    {
        $entity = CategoryData::from($category);

        return view('admin.categories.form', compact('entity'));
    }

    public function store(CategoryData $request)
    {
        Category::query()->create(Arr::only($request->all(), ['id', 'title', 'is_active']));

        $request->is_active = $request->is_active == true ? 1 : 0;

        Session::flash('success', 'Category created successfully');

        return redirect()->route('admin.categories.index');
    }

    public function update(CategoryData $request, $id)
    {
        $entity = Category::query()->findOrFail($id);

        $request->is_active = $request->is_active == true ? 1 : 0;

        $entity->update(Arr::only($request->all(), ['title', 'is_active']));

        Session::flash('success', 'Category updated successfully');

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        Session::flash("success", "Category deleted successfully");

        return redirect()->back();
    }
}
