<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
<table border="" style="width: 60%; margin: auto;">
    <tr>
        <th>Sl_No</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach($categories as $category)
    <tr>

             <td>{{++$loop->index}}</td>
            <td>{{$category->name}}</td>
            <td>
                <a href="#">Edit</a>
                <a href="#">Delete</a>

            </td>

    </tr>
    @endforeach
</table>

</body>
</html>
