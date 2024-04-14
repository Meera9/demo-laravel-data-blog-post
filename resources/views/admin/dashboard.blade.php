@extends('layouts.admin')
@section('title')
<title>
    Dashboard
</title>
@endsection

@section('content')
<h4>Welcome, Dashboard!</h4>
<div class="row my-5">
    <div class="col-4">
        <a href="{{route('admin.blogs.index')}}" target="_blank">
            <div class="card">
                <div class="card-header">
                    Blogs
                </div>
                <div class="card-body">
                    {{$blogs}}
                </div>
            </div>
        </a>
    </div>
    <div class="col-4">
        <a href="{{route('admin.posts.index')}}" target="_blank">
            <div class="card">
                <div class="card-header">
                    Posts
                </div>
                <div class="card-body">
                    {{$posts}}
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
