<form action="{{ route('admin.subcategories.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" class="form-control">
    <br>
    <br>
    <br>
    <button class="btn btn-primary">Import User Data</button>
</form>

<table class="table table-bordered mt-3">
    <tr>
        <th colspan="3">
            List Of Users
            <a class="btn btn-danger float-end" href="{{ route('admin.subcategories.export') }}">Export Subcategories Data</a>
        </th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
    @foreach($subcategories as $subcategory)
        <tr>
            <td>{{ $subcategory->id }}</td>
            <td>{{ $subcategory->title }}</td>
            <td>{{ $subcategory->descr }}</td>
        </tr>
    @endforeach
</table>
