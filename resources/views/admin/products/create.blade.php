@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small>Добавление продукта</small></h2>
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
                                    <a class="dropdown-item" href="{{ route('admin.category.create') }}">Create catalog</a>
                                    <a class="dropdown-item" href="{{ route('admin.editCategories') }}">Edit all</a>
                                </div>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            При добавлении данных обратите внимание и выберите нужную локаль. <span class="text-danger">Данные будут добавляться на текущем языке</span>
                        </p>
                        <form action="" method="post" novalidate enctype="multipart/form-data" class="categories">
                                <div class="row-wrapper">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="input-wrapper">
                                                <label for="seo_title">
                                                    <input type="text" name="seo_title" class="form-control" placeholder="Введите Seo название">
                                                </label>
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="seo_description">
                                                    <textarea class="resizable_textarea form-control" name="seo_description" placeholder="Seo описание продукта"></textarea>
                                                </label>
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="meta_keywords">
                                                    <textarea class="resizable_textarea form-control" name="meta_keywords" placeholder="Мета ключи продукта"></textarea>
                                                </label>
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="attribute_title">
                                                    <input type="text" name="attribute_title" class="form-control" placeholder="Название аттрибута">
                                                </label>
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="file_url">
                                                    <input type="file" name="file_url[]" >
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="input-wrapper">
                                                <label>
                                                    <input type="text" name="parent_id" class="form-control" placeholder="Ведите название каталога" id="parent_id">
                                                    <input type="hidden" name="parent_id_hidden" id="parent_id_hidden">
                                                </label>
                                                <div id="suggestions"></div>
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="title">
                                                    <input class="form-control" name="title" placeholder="Название продукта" required="required">
                                                </label>
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="description">
                                                    <textarea class="resizable_textarea form-control" name="description" placeholder="Описание продукта"></textarea>
                                                </label>
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="attribute_title">
                                                    <input type="text" name="attribute_value" class="form-control" placeholder="Значение аттрибута">
                                                </label>
                                            </div>
                                            <div class="input-wrapper">
                                                <label for="search_attribute">
                                                    <input type="text" id="search_attribute" name="search_attribute">
                                                </label>
                                                <div id="attribute"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-success btn-sm">сохранить</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
