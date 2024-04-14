<?php

namespace App\Http\Controllers\Admin;

use App\Data\BlogData;
use App\Data\BlogRequestData;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    private $with = ['posts', 'comments', 'categories'];

    public function index()
    {
        $entities = BlogData::collect(Blog::query()->with($this->with)->orderByDesc('id')->paginate(5));

        return view('admin.blogs.index', compact('entities'));
    }

    public function create()
    {
        return view('admin.blogs.form');
    }

    public function edit(Blog $blog)
    {
        $blog->load($this->with);

        $entity = BlogData::from($blog);

        return view('admin.blogs.form', compact('entity'));
    }

    public function store(BlogRequestData $request)
    {
        $entity = Blog::query()->create(Arr::except($request->all(), ['category_ids']));

        $entity->categories()->sync($request->category_ids);

        Session::flash('success', 'Blog created successfully');

        return redirect()->route('admin.blogs.index');
    }

    public function update(BlogRequestData $request, $id)
    {
        $entity = Blog::query()->findOrFail($id);

        $entity->update(Arr::except($request->all(), ['category_ids']));

        $entity->categories()->sync($request->category_ids);

        Session::flash('success', 'Blog updated successfully');

        return redirect()->route('admin.blogs.index');
    }

    public function destroy(Blog $blog)
    {
        if ( $blog->posts()->exists() ) {
            $blog->posts()->delete();
        }

        $blog->delete();

        Session::flash("success", "Blog deleted successfully");

        return redirect()->back();
    }
}
