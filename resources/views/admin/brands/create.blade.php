<form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label>
        @if($errors->has(app()->getLocale().'_title'))
            <div class="invalid-feedback">
                {{ $errors->first(app()->getLocale().'_title') }}
            </div>
        @endif
        <input type="text" name="{{ app()->getLocale().'_title' }}" class="{{ $errors->has(app()->getLocale().'_title') ? 'is-invalid' : '' }}">
    </label>
    <label>
        @if($errors->has(app()->getLocale().'_descr'))
            <div class="invalid-feedback">
                {{ $errors->first(app()->getLocale().'_descr') }}
            </div>
        @endif
        <textarea name="{{ app()->getLocale().'_descr' }}"></textarea>
    </label>
    <input type="file" name="file_url" class="">
    <button type="submit">submit</button>
</form>
