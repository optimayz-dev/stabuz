@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small>Поиск продуктов</small></h2>
                        <form action="">
                            <input type="text" name="search" id="search" class="search-input" placeholder="Введите название продукта">
                        </form>
                        <div id="result">
                            <div id="list-container">
                                <!-- Здесь будут отображаться результаты поиска -->
                            </div>
                        </div>

{{--                        <div class="clearfix"></div>--}}
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <div class="nav-box">
                                        <p class="text-muted font-13 m-b-30">
                                            Товары {{--<code>$().DataTable();</code>--}}
                                        @if(session('error'))
                                            <div class="alert alert-error">
                                                {{ session('error') }}
                                            </div>
                                            @endif
                                            </p>
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
                                                        <a class="dropdown-item" href="{{ route('admin.product.create') }}">Создать товар</a>
                                                        <a class="dropdown-item" href="{{ route('admin.product.viewImport') }}">Export/Import</a>
                                                    </div>
                                                </li>
                                            </ul>
                                    </div>
                                    <form action="{{ route('admin.product.handleBulkActions') }}" method="post">
                                        @method('patch')
                                        @csrf
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Выбрать</th>
                                                <th>ID</th>
                                                <th>Название</th>
                                                <th>Seo title</th>
                                                <th>Seo Description</th>
                                                <th>Meta keywords</th>
                                                <th>Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>
                                                        <label>
                                                            <input type="checkbox" name="id[]" value="{{ $product->id }}">
                                                        </label>
                                                    </td>
                                                    <td>{{ $product->id }}</td>
                                                    <td><a href="{{ route('admin.product.show', $product->id) }}">{{ $product->title }}</a></td>
                                                    <td>{{ $product->seo_title }}</td>
                                                    <td>{{ Str::limit($product->seo_description, 50) }}</td>
                                                    <td>{{ Str::limit($product->meta_keywords, 50) }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.product.show',$product->id) }}" method="GET">
                                                            <button type="submit">
                                                                rerere
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="btn-wrapper">
                                            <button type="submit" class="action-btn" name="action" value="edit"><i class="fa fa-edit"></i> Edit Selected</button>
                                            <button type="submit" class="action-btn" name="action" value="delete" style="color: red"><i class="fa fa-trash"></i> Delete Selected</button>
{{--                                            <a class="action-btn" href="{{ route('admin.category.export') }}"><i class="fa fa-cloud-download"></i> export data</a>--}}
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


