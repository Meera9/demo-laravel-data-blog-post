@extends('layouts.master')
@section('title')
<title>
    Post | {{$entity->title}}
</title>
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
                    @if($entity->blog && $entity->blog->categories)
                    @foreach ($entity->blog->categories as $category)
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$category->title}}</a>
                    @endforeach
                    @endif
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


            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        @auth
                        <!-- Comment form-->
                        <form class="mb-4"><textarea class="form-control" rows="3"
                                                     placeholder="Join the discussion and leave a comment!"></textarea>
                        </form>
                        @endauth
                        <!-- Comment with nested comments-->

                        @foreach($entity->comments as $comment)
                        <div class="d-flex mb-4">
                            <!-- Parent comment-->
                            <div class="flex-shrink-0"><img class="rounded-circle"
                                                            src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                            alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">{{$comment->author->name}}</div>
                                {{$comment->content}}

                                @if($comment->children->count() > 0)
                                @foreach($comment->children as $child)
                                <div class="d-flex mt-4">

                                    <div class="flex-shrink-0"><img class="rounded-circle"
                                                                    src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                                    alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">{{$comment->author->name}}</div>
                                        {{$comment->content}}
                                    </div>
                                </div>
                                @endforeach

                                @endif

                            </div>
                        </div>

                        @endforeach
                    </div>
            </section>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    @include('categories.list',['categories' => $entity->blog->categories])
                </div>
            </div>

            <!-- Side widget-->
            <div class="card mb-4" id="sidebar-posts">
                <div class="card-header">Related posts</div>
                <div class="card-body">
                    @foreach($related_posts as $post)
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
