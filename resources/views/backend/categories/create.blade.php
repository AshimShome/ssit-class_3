<x-success/>
<x-validError/>
<form action="{{route('admin.category.store')}}"method="post">
    @csrf
<table>
    <tr>
        <td><label for="name">Category Name</label></td>
        <td><input type="text" id="name" name="name"></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
           <label><input type="radio"name="status" value="active">Active</label>
            <label><input type="radio"name="status" value="inactive">Inactive</label>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Save Category"></td>
    </tr>

</table>
</form>
