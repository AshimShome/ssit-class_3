@extends('backend.app')
@section('title','Manage Category')


@section('main-container')
<x-success/>
<x-error/>
<x-validError/>
<div class="d-flex justify-content-between py-2">
    <h3>Manage categories</h3>
    <a href="{{route('admin.category.create')}}"class="btn btn-info">Add categories</a>

</div>

<table class="table table-bordered">
    <tr>
        <th>Sl_No</th>
        <th>Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach($category as $category)
    <tr>

             <td>{{++$loop->index}}</td>
            <td>{{$category->name}}</td>
            <td>{{ucfirst($category->status)}}</td>

            <td>
                <a href="{{route('admin.category.edit',$category->id)}}">Edit</a>
                <a href="{{route('admin.category.show',$category->id)}}">Show</a>
                <form action="{{route('admin.category.destroy',$category->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <a href="{{route('admin.category.destroy',$category->id)}}"onclick="event.preventDefault();this.closest('form').submit()">Delete</a>
                </form>

            </td>

    </tr>
    @endforeach
</table>

@endsection
