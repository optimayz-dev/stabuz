<h1>Hello Admin!</h1>
<form action="{{ route('admin.logout') }}" method="post">
    @csrf
    <input type="submit">
</form>
