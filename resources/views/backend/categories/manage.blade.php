<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
<x-success/>
<x-error/>
<x-validError/>
<div>
    <a href="{{route('admin.category.create')}}">Add categories</a>
</div>

<table border="" style="width: 60%; margin: auto;">
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

</body>
</html>
