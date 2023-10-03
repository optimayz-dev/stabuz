@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small>Бренды</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="dropdown" style="padding-right: 15px;">
                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px" data-toggle="dropdown" role="button" aria-expanded="true"><i class="fa fa-language"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>

{{--                            <li class="dropdown" style="padding-right: 15px;">--}}
{{--                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <a class="dropdown-item" href="{{ route('admin.catalog.index') }}">All catalogs</a>--}}
{{--                                    <a class="dropdown-item" href="{{ route('admin.catalog.create') }}">Create catalog</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
{{--                                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>--}}
                                    </p>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                                        @method('patch')
                                        @csrf
                                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
                                            <thead>
                                            <tr>

                                                <th>Заголовок</th>
                                                <th>Seo заголовок</th>
                                                <th>Seo описание</th>
                                                <th>Описание</th>
                                                <th>Meta keywords</th>
                                                <th>Логотип Бренда</th>
                                            </tr>
                                            </thead>
                                            <tbody>
{{--                                            @dd($brand)--}}
                                            <tr>
                                                <td>
                                                    <label>
                                                        @error('title')
                                                        <code>{{ $message }}</code>
                                                        @enderror
                                                        <input type="text" name="title" class="updateSelected" placeholder="Название" value="{{ $brand->title }}" >
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        @error('seo_title')
                                                        {{ $message }}
                                                        @enderror
                                                        <input type="text" name="seo_title" class="updateSelected" placeholder="Seo название" value="{{ $brand->seo_title }}">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        @error('seo_description')
                                                        {{ $message }}
                                                        @enderror
                                                        <textarea name="seo_description" class="updateSelected" placeholder="Seo Описание">{{ $brand->seo_description }}</textarea>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        @error('description')
                                                        {{ $message }}
                                                        @enderror
                                                        <textarea name="description" class="updateSelected" placeholder="Seo Описание">{{ $brand->description }}</textarea>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        @error('meta_keywords')
                                                        {{ $message }}
                                                        @enderror
                                                        <textarea type="text" name="meta_keywords" placeholder="Мета ключи" class="updateSelected">{{ $brand->meta_keywords }}</textarea>
                                                    </label>
                                                </td>
                                                <td>
                                                    <img src="{{ asset($brand->brand_logo) }}" alt="" style="width: 75px">
                                                    <label>
                                                        @error('brand_logo')
                                                        {{ $message }}
                                                        @enderror
                                                        <input type="file" name="brand_logo" class="updateSelected">
                                                    </label>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div>
                                            <label for="">Выберите категории брендов <br>
                                                <select id="e1" style="width: 300px;" multiple name="categories_id[]" class="select">
                                                    @foreach($brand->categories as $item)
                                                        <option value="{{ $item->id }}" selected> {{ $item->title }}</option>
                                                    @endforeach
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </label>

                                        </div>
                                        <div class="btn-wrapper">
                                            <button type="submit" class="btn btn-success">Изменить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

