@extends('layouts.admin')
@section('title')
<title>
    Category
</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST"
                  action="{{ isset($entity) ? route('admin.categories.update', $entity->id) : route('admin.categories.store') }}">
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
                            <label>Is Active?</label>
                            <div>
                                <input type="checkbox" name="is_active" value="true"  {{ isset($entity) && $entity->is_active ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-end mt-5">
                    <div class="btn-group">
                        <button class="btn btn-outline-info" type="submit">{{ isset($entity) ? 'Update' : 'Create'
                            }}
                        </button>
                        <a class="btn btn-outline-warning" href="{{route('admin.categories.index')}}"> Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
