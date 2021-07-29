<x-success/>
<x-error/>
<x-validError/>

<form action="{{route('admin.category.store')}}"method="post">
    @csrf
<table>
    <tr>
        <td><label for="name">Category Name</label></td>
        <td><input type="text" id="name" value="{{old('name')}}" name="name"></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
           <label><input type="radio"name="status" value="active"{{old('status')==='active'?'checked':""}}>Active</label>
            <label><input type="radio"name="status" value="inactive"{{old('status')==='inactive'?'checked':""}}>Inactive</label>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Save Category"></td>
    </tr>

</table>
</form>
