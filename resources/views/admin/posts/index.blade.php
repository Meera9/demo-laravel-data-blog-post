@extends('layouts.admin')
@section('title')
<title>
    Posts
</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-end mb-2">
            <a href="{{route('admin.posts.create')}}" class="btn btn-primary btn-sm">Add New</a>
        </div>

        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Title</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entities as $key => $entity)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$entity->title}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-info me-2" href="{{route('admin.posts.edit',['post' => $entity->id])}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.posts.destroy', $entity->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                {{ $entities->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
