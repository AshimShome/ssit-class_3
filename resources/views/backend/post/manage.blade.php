@extends('backend.app')
@section('title','Manage Post')


@section('main-container')
    <x-success/>
    <x-error/>
    <x-validError/>
    <div class="d-flex justify-content-between py-2">
        <h3>Manage Post</h3>
        <a href="{{route('admin.posts.create')}}"class="btn btn-info">Add post</a>

    </div>

    <table class="table table-bordered">
        <tr>
            <th>Sl_No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($posts as $post)
            <tr>

                <td>{{++$loop->index}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td><img class="w-75" src="{{$post->image}}"alt=""></td>
                <td>{{ucfirst($post->status)}}</td>

                <td>
                    <a href="{{route('admin.posts.edit',$post->id)}}">Edit</a>
                    <a href="{{route('admin.posts.show',$post->id)}}">Show</a>
                    <form action="{{route('admin.posts.destroy',$post->id)}}" method="post">
                        @csrf
                        @method('DELETE')

                        <a href="{{route('admin.posts.destroy',$post->id)}}"onclick="event.preventDefault();this.closest('form').submit()">Delete</a>
                    </form>

                </td>

            </tr>
        @endforeach

    </table>

@endsection
