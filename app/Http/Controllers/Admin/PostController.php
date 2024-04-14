<?php

namespace App\Http\Controllers\Admin;

use App\Data\PostData;
use App\Data\PostRequestData;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    private $with = ['blog'];

    public function index()
    {
        $entities = PostData::collect(Post::query()->orderByDesc('id')->paginate(10));

        return view('admin.posts.index', compact('entities'));
    }

    public function create()
    {
        return view('admin.posts.form');
    }

    public function edit(Post $post)
    {
        $post->load($this->with);

        $entity = PostData::from($post);

        return view('admin.posts.form', compact('entity'));
    }

    public function store(PostRequestData $request)
    {
        Post::query()->create($request->all());

        Session::flash('success', 'Post created successfully');

        return redirect()->route('admin.posts.index');
    }

    public function update(PostRequestData $request, $id)
    {
        $entity = Post::query()->findOrFail($id);

        $entity->update($request->all());

        Session::flash('success', 'Post updated successfully');

        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash("success", "Post deleted successfully");

        return redirect()->back();
    }
}
