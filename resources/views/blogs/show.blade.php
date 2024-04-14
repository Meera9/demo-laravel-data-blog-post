@extends('layouts.master')
@section('title')
<title>Blog | {{$entity->title}}</title>
@endsection

@section('content')
<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{$entity->title}}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on {{dateFormat($entity->created_at)}} by
                        {{$entity->author->name}}
                    </div>
                    <!-- Post categories-->

                    @foreach ($entity->categories as $category)
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$category->title}}</a>
                    @endforeach
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded"
                                          src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." />
                </figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{{$entity->description}}</p>
                </section>
            </article>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..."
                               aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    @include('categories.list',['categories' => $entity->categories])
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4" id="sidebar-posts">
                <div class="card-header">Posts</div>
                <div class="card-body">
                    @foreach(collect($entity->posts)->take(3) as $post)
                    <div class="card mb-3">
                        <a href="{{route('posts.show',['post' => $post->id])}}" target="_blank">
                            <div class="row p-1">
                                <div class="col-3 post-img">
                                    <img class="img-fluid rounded h-100"
                                         src="https://dummyimage.com/100x50/ced4da/6c757d.jpg"
                                         alt="{{$post->id}}-img" />
                                </div>
                                <div class="col-9 text-start">
                                    <h6 class="post-title">
                                        {{$post->title}}
                                    </h6>
                                    <small class="post-description">
                                        {{strLimit($post->description,30)}}
                                    </small>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
