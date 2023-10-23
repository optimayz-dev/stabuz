@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small>Plus Table Design</small></h2>
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

                            <li class="dropdown" style="padding-right: 15px;">
                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('admin.catalog.index') }}">All catalogs</a>
                                    <a class="dropdown-item" href="{{ route('admin.catalog.create') }}">Create catalog</a>
                                </div>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                                    </p>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="container">
                                        <form action="{{ route('admin.catalog.store') }}" method="POST" class="categories" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">
                                                            Введите название
                                                            @error('title')
                                                            <div class=title>{{ $message }}</div>
                                                            @enderror
                                                        </label>
                                                        <input type="text" name="title" class="form-control" placeholder="Введите название">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="seo_title" class="form-label">
                                                            Введите seo название
                                                            @error('seo_description')
                                                            <div class=title>{{ $message }}</div>
                                                            @enderror
                                                        </label>
                                                        <input type="text" name="seo_title" class="form-control" placeholder="Введите seo название">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">
                                                            Введите описание
                                                            @error('description')
                                                            <div class=title>{{ $message }}</div>
                                                            @enderror
                                                        </label>
                                                        <textarea class="form-control" name="description" placeholder="Введите описание"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="seo_description" class="form-label">
                                                            Введите seo описание
                                                            @error('seo_description')
                                                            <div class=title>{{ $message }}</div>
                                                            @enderror
                                                        </label>
                                                        <textarea class="form-control" name="seo_description" placeholder="Введите seo описание"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="meta_keywords" class="form-label">
                                                            Введите мета ключи
                                                            @error('meta_keywords')
                                                            <div class=title>{{ $message }}</div>
                                                            @enderror
                                                        </label>
                                                        <textarea class="form-control" name="meta_keywords" placeholder="Введите мета ключи"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="category_img" class="form-label">
                                                            Добавьте картинку
                                                        </label>
                                                        <input type="file" name="category_img" class="form-control" style="height: auto;">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-success" style="margin-top: 27px;">Добавить категорию</button>
                                                </div>
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
    </div>
@endsection
