@extends('backend.app')
@section('title','Post Update')


@section('main-container')
    <x-success/>
    <x-error/>
    <x-validError/>
    <div class="d-flex justify-content-between py-2">
        <h3>Post Update</h3>
        <a href="{{route('admin.posts.index')}}"class="btn btn-info">Manage post</a>

    </div>

    <form action="{{route('admin.posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
        @method('put')
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category"class="form-control">
                <option value="">Select Category</option>
                @foreach($category as $category)
                <option value="{{ $category->id}}"{{$post->category_id==$category->id?'selected':""}}>{{ $category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control"name="title"value="{{$post->title}}" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description"name="description"rows="5"class="form-control">{{$post->title}}</textarea>

        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" value="{{old('image')}}"id="image">
            <td><img style="width: 100px" src="{{asset('uploads/posts/'.$post->image)}}"alt=""></td>

        </div>
        <div class="mb-3">
            <label  class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="active" value="active"{{$post->status==='active'?'checked':""}}>
                <label class="form-check-label"  for="active">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive"{{$post->status==='inactive'?'checked':""}} >
                <label class="form-check-label"for="inactive">Inactive</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>



@endsection
