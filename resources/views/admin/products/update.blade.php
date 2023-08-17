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
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <form action="{{ route('admin.update.subcategory-products') }}" method="post" novalidate enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @foreach($subcategory->products as $product)
                                    <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                    <div class="row-wrapper">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="input-wrapper">
                                                    <h4 class="form-title">Продукт: {{ $product->title }}</h4>
                                                    <label for="title">
                                                        <input class="form-control" name="title_{{ $product->id }}" placeholder="название продукта" required="required" value="{{ $product->title }}">
                                                    </label>
                                                </div>
                                                <div class="input-wrapper">
                                                    <label for="title">
                                                        <textarea class="resizable_textarea form-control" name="descr_{{ $product->id }}">{{ $product->descr }}</textarea>
                                                    </label>
                                                </div>
                                                <div class="input-wrapper">
                                                    <label for="file_url">
                                                        <input type="file" name="file_url_{{ $product->id }}">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">

                                            </div>
                                        </div>
                                        <p>Конец<code> "{{ $product->title }}"</code> продукта</p>
                                    </div>
                                @endforeach
                                    <button type="submit" class="btn btn-success btn-sm">сохранить</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

