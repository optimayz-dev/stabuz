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
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.product.update', $product->id) }}" method="post" novalidate enctype="multipart/form-data" class="categories">
                            @method('put')
                            @csrf
                            <div class="row-wrapper">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-wrapper">
                                            <label for="seo_title">
                                                @error('seo_title')
                                                <div class=seo_title>{{ $message }}</div>
                                                @enderror
                                                <input type="text" name="seo_title" class="form-control" placeholder="Введите Seo название" value=" {{ $product->seo_title ?? '' }} ">
                                            </label>
                                        </div>
                                        <div class="input-wrapper">
                                            <label for="seo_description">
                                                @error('seo_description')
                                                <div class=seo_description>{{ $message }}</div>
                                                @enderror
                                                <textarea class="resizable_textarea form-control" name="seo_description" placeholder="Seo описание продукта"> {{ $product->seo_description ?? '' }}</textarea>
                                            </label>
                                        </div>
                                        <div class="input-wrapper">
                                            <label for="meta_keywords">
                                                @error('meta_keywords')
                                                <div class=meta_keywords>{{ $message }}</div>
                                                @enderror
                                                <textarea class="resizable_textarea form-control" name="meta_keywords" placeholder="Мета ключи продукта"> {{ $product->meta_keywords ?? '' }}</textarea>
                                            </label>
                                        </div>
                                        <div class="input-wrapper">
                                            <label for="attribute_title">
                                                @error('attribute_title')
                                                <div class=attribute_title>{{ $message }}</div>
                                                @enderror
                                                <input type="text" name="attribute_title" class="form-control" placeholder="Название аттрибута" value="{{ $product->attribute_value ?? '' }}" >
                                            </label>
                                        </div>
                                        <div class="input-wrapper">
                                            <label for="file_url">
                                                @error('file_url')
                                                <div class=file_url>{{ $message }}</div>
                                                @enderror
                                                <input type="file" name="file_url" >
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6" >

                                        <div id="more-input">
                                            <div class="input-wrapper">
                                                <label>
                                                    @error('parent_id_hidden')
                                                    <div class=parent_id_hidden>{{ $message }}</div>
                                                    @enderror
                                                    <input type="text" name="parent_id" class="form-control parent_id" placeholder="Ведите название категории" id="parent_id" value="">
                                                    <input type="hidden" name="parent_id_hidden" id="parent_id_hidden">
{{--                                                    <div class="form-group">--}}
{{--                                                        <span id="addEmail" class="btn ">+</span>--}}
{{--                                                        <span id="removeEmail" class="btn">-</span>--}}
{{--                                                    </div>--}}
                                                </label>
                                                <div class="suggestions"></div>
                                            </div>
                                        </div>

                                        <div class="input-wrapper">
                                            <label for="title">
                                                @error('title')
                                                <div class=title>{{ $message }}</div>
                                                @enderror
                                                <input class="form-control" name="title" placeholder="Название продукта" required="required" value="{{ $product->title ?? '' }}" >
                                            </label>
                                        </div>
                                        <div class="input-wrapper">
                                            <label for="description">
                                                @error('description')
                                                <div class=description>{{ $message }}</div>
                                                @enderror
                                                <textarea class="resizable_textarea form-control" name="description" placeholder="Описание продукта"> {{ $product->description ?? '' }} </textarea>
                                            </label>
                                        </div>
                                        <div class="input-wrapper">
                                            <label for="attribute_title">
                                                @error('attribute_value')
                                                <div class=attribute_value>{{ $message }}</div>
                                                @enderror
                                                <input type="text" name="attribute_value" class="form-control" placeholder="Значение аттрибута" value="{{ $product->attribute_value ?? '' }}">
                                            </label>
                                        </div>
                                        <div class="input-wrapper">
                                            <label style="display: flex; width: 90%;">
                                                @error('price')
                                                <div class=price>{{ $message }}</div>
                                                @enderror
                                                <input type="text" name="price" class="form-control" placeholder="Цена">
                                                @error('currency_code')
                                                <div class=currency_code>{{ $message }}</div>
                                                @enderror
                                                <select name="currency_code" class="form-control">
                                                    @foreach($currencies as $currency)
                                                        <option value="{{ $currency->id }}">{{ $currency->currency_code }}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h2>
                                            <small>Теги</small>
                                        </h2>
                                    </div>
                                    @foreach($tags as $tag)
                                        <div class="col-md-2">
                                            <div class="input-wrapper">
                                                <div class="form-check">
                                                    <label class="form-check-label" for="">
                                                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tag_id[]">
                                                        {{ $tag->title }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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

