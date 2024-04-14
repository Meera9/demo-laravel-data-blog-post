@extends('layouts.admin')
@section('title')
<title>
    Post
</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST"
                  action="{{ isset($entity) ? route('admin.posts.update', $entity->id) : route('admin.posts.store') }}">
                @csrf

                @if(isset($entity))
                @method('PUT')
                @endif

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" type="text" name="title"
                                   value="{{ isset($entity) ? $entity->title : '' }}"
                                   placeholder="Title" />
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Blog</label>
                            <select class="form-select" id="multiple-select-field" data-placeholder="Choose anything" name="blog_id">
                                @foreach(activeBlogs() as $keyBlog => $blog)
                                <option @if(isset($entity) && $entity->blog->id == $keyBlog) selected @endif
                                    value="{{$keyBlog}}">{{$blog}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description"
                                      placeholder="description">{{ isset($entity) ? $entity->description : '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-end mt-5">
                    <div class="btn-group">
                        <button class="btn btn-outline-info" type="submit">{{ isset($entity) ? 'Update' : 'Create'
                            }}
                        </button>
                        <a class="btn btn-outline-warning" href="{{route('admin.posts.index')}}"> Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
