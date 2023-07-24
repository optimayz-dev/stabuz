<form action="{{ route('admin.login_process') }}" method="post">
    @csrf
    @error('email')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    <label>
        <input type="email" name="email">
    </label>
    <label>
        <input type="password" name="password">
    </label>
    <button type="submit">submit</button>
</form>
