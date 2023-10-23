@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small>Изменение категории</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="dropdown" style="padding-right: 15px;">
                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px"
                                   data-toggle="dropdown" role="button" aria-expanded="true"><i
                                        class="fa fa-language"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" hreflang="{{ $localeCode }}"
                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>

                            <li class="dropdown" style="padding-right: 15px;">
                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px"
                                   data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('admin.category.index') }}">All
                                        categories</a>
                                    <a class="dropdown-item" href="{{ route('admin.category.create') }}">Create
                                        categories</a>
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
                                        При добавлении данных обратите внимание и выберите нужную локаль. <span
                                            class="text-danger">Данные будут добавляться на текущем языке</span>
                                    </p>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="container">
                                        <form action="{{ route('admin.category.updateFromParent', $category->id) }}" method="POST"
                                              class="categories" enctype="multipart/form-data">
                                            @csrf
                                            @method('post')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">
                                                            Введите название
                                                            @error('title')
                                                            <div class=title>{{ $message }}</div>
                                                            @enderror
                                                        </label>
                                                        <input type="text" name="title" class="form-control"
                                                               placeholder="Введите название"
                                                               value="{{ $category->title ?? '' }}">
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
                                                        <input type="text" name="seo_title" class="form-control"
                                                               placeholder="Введите seo название"
                                                               value="{{ $category->seo_title }}">
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
                                                        <textarea class="form-control" name="description"
                                                                  placeholder="Введите описание">{{ $category->description ?? '' }}</textarea>
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
                                                        <textarea class="form-control" name="seo_description"
                                                                  placeholder="Введите seo описание">{{ $category->seo_description ?? '' }}</textarea>
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
                                                        <textarea class="form-control" name="meta_keywords"
                                                                  placeholder="Введите мета ключи">{{ $category->meta_keywords }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="category_img" class="form-label">
                                                            Добавьте картинку
                                                        </label>
                                                        <img src="{{ asset($category->category_img) }}" alt=""
                                                             style="width: 150px">
                                                        <input type="file" name="category_img" class="form-control"
                                                               style="height: auto;">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-success"
                                                            style="margin-top: 27px;">Сохранить
                                                    </button>
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
