@extends('layouts.admin')
@section('title')
<title>
    Blog
</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST"
                  action="{{ isset($entity) ? route('admin.blogs.update', $entity->id) : route('admin.blogs.store') }}">
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
                            <label>Category</label>
                            <select class="form-select" id="multiple-select-field" data-placeholder="Choose anything"
                                    multiple name="category_ids[]">
                                @foreach(activeCategories() as $keyCategory => $category)
                                @if(isset($entity) && in_array($keyCategory,$entity->
                                categories->toCollection()->pluck('id')->toArray()))
                                <option
                                    selected
                                    value="{{$keyCategory}}">{{$category}}
                                </option>
                                @else
                                <option
                                    value="{{$keyCategory}}">{{$category}}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Order</label>
                            <input class="form-control" type="number" name="order"
                                   value="{{ isset($entity) ? $entity->order : '' }}"
                                   placeholder="Order" />
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
                        <a class="btn btn-outline-warning" href="{{route('admin.blogs.index')}}"> Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
