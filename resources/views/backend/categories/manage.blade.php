<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
<x-success/>
<div>
    <a href="{{route('admin.category.create')}}">Add categories</a>
</div>

<table border="" style="width: 60%; margin: auto;">
    <tr>
        <th>Sl_No</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach($category as $category)
    <tr>

             <td>{{++$loop->index}}</td>
            <td>{{$category->name}}</td>

            <td>
                <a href="#">Edit</a>
                <a href="{{route('admin.category.show',$category->id)}}">Show</a>
                <form action="{{route('admin.category.destroy',$category->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>

            </td>

    </tr>
    @endforeach
</table>

</body>
</html>
