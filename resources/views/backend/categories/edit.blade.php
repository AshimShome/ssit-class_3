<x-success/>
<x-error/>
<x-validError/>

<form action="{{route('admin.category.update',$category->id )}}"method="post">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td><label for="name">Category Name</label></td>
            <td><input type="text" id="name" value="{{$category->name}}" name="name"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <label><input type="radio"name="status" value="active"{{$category->status==='active'?'checked':""}}>Active</label>
                <label><input type="radio"name="status" value="inactive"{{$category->status==='inactive'?'checked':""}}>Inactive</label>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Update Category"></td>
        </tr>

    </table>
</form>
