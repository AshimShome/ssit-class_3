@extends('backend.app')
@section('title','Post Create')


@section('main-container')
    <x-success/>
    <x-error/>
    <x-validError/>
    <div class="d-flex justify-content-between py-2">
        <h3>Add New Post</h3>
        <a href="{{route('admin.posts.index')}}"class="btn btn-info">Manage post</a>

    </div>

    <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control"name="title"value="{{old('title')}}" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description"value="{{old('description')}}"name="description"rows="5"class="form-control"></textarea>

        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" value="{{old('image')}}"id="image">
        </div>
        <div class="mb-3">
            <label  class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="active" value="active">
                <label class="form-check-label" for="active">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive">
                <label class="form-check-label" for="inactive">Inactive</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



@endsection
