<form action="{{ route('admin.login_process') }}" method="post">
    @csrf
    <label>
        <input type="email" name="email">
    </label>
    <label>
        <input type="password" name="password">
    </label>
    <button type="submit">submit</button>
</form>
