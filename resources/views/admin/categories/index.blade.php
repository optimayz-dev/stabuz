@extends('admin.__layouts.layout')
@section('content')
{{--    <div class="right_col" role="main">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12 col-sm-12 ">--}}
{{--                <div class="x_panel">--}}
{{--                    <div class="x_title">--}}
{{--                        <h2><small>Поиск категории</small></h2>--}}
{{--                        <form action="">--}}
{{--                            <input type="text" name="search" id="search" class="search-input" placeholder="Введите название категории">--}}
{{--                        </form>--}}
{{--                        <div id="result">--}}
{{--                            <div id="list-container">--}}
{{--                                --}}{{--                                 Здесь будут отображаться результаты поиска --}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="clearfix"></div>--}}
{{--                    </div>--}}
{{--                    <div class="x_content">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-12">--}}
{{--                                <div class="card-box table-responsive">--}}
{{--                                    <div style="display: flex; align-items: center;justify-content: space-between;">--}}
{{--                                        <p class="text-muted font-13" style="margin-bottom: 0;">--}}
{{--                                            Categories--}}
{{--                                        </p>--}}
{{--                                        <ul class="nav navbar-right panel_toolbox" style="margin-right: 80px;">--}}
{{--                                            <li class="dropdown" style="padding-right: 15px;">--}}
{{--                                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px" data-toggle="dropdown" role="button" aria-expanded="true"><i class="fa fa-language"></i></a>--}}
{{--                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                                                        <a class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                                                            {{ $properties['native'] }}--}}
{{--                                                        </a>--}}
{{--                                                    @endforeach--}}
{{--                                                </div>--}}
{{--                                            </li>--}}

{{--                                            <li class="dropdown" style="padding-right: 15px;">--}}
{{--                                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>--}}
{{--                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                                    <a class="dropdown-item" href="{{ route('admin.category.create') }}">Add category</a>--}}
{{--                                                    <a class="dropdown-item" href="{{  route('admin.editCategories') }}">Edit all</a>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}

{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    @if (session('success'))--}}
{{--                                        <div class="alert alert-success">--}}
{{--                                            {{ session('success') }}--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    @foreach($categories as $category)--}}
{{--                                        <h3 style="padding: 8px 0; border-top: 2px solid darkgray">{{ $category->title }} / {{ $category->id }}</h3>--}}
{{--                                        <form action="{{ route('admin.category.handleBulkActions') }}" method="post">--}}
{{--                                            @method('patch')--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" value="{{ $category->id }}" name="select_catalogs">--}}
{{--                                            <table id="datatable-checkbox{{ $category->id }}" class="table table-striped table-bordered bulk_action" style="width:100%">--}}
{{--                                                <thead>--}}
{{--                                                <tr>--}}
{{--                                                    <th>--}}
{{--                                                    <th>Select</th>--}}

{{--                                                    <th>Position</th>--}}
{{--                                                    <th>Title</th>--}}
{{--                                                    <th>Description</th>--}}
{{--                                                    --}}{{--                                                    <th>Age</th>--}}
{{--                                                    <th>Created date</th>--}}
{{--                                                    --}}{{--                                            <th>Действие</th>--}}
{{--                                                </tr>--}}
{{--                                                </thead>--}}
{{--                                                <tbody>--}}
{{--                                                @foreach($category->children as $subcategory)--}}
{{--                                                    <tr>--}}
{{--                                                        <td>--}}
{{--                                                        <th>--}}
{{--                                                            <label>--}}
{{--                                                                <input type="checkbox" name="selected_category[]" value="{{ $subcategory->id }}">--}}
{{--                                                            </label>--}}
{{--                                                        </th>--}}
{{--                                                        <td>{{ $subcategory->id }} / {{ $category->id }}</td>--}}
{{--                                                        <td>{{ $subcategory->title }}</td>--}}
{{--                                                        <td>{{ Str::limit($subcategory->description, 50) }}</td>--}}
{{--                                                        --}}{{--                                                        <td>61</td>--}}
{{--                                                        <td>{{ $subcategory->created_at }}</td>--}}
{{--                                                        --}}{{--                                                <td>редактировать</td>--}}
{{--                                                    </tr>--}}
{{--                                                @endforeach--}}
{{--                                                </tbody>--}}
{{--                                            </table>--}}
{{--                                            <div class="btn-wrapper">--}}
{{--                                                <button type="submit" class="action-btn" name="action" value="edit"><i class="fa fa-edit"></i> Edit Selected</button>--}}
{{--                                                <button type="submit" class="action-btn" name="action" value="delete" style="color: red"><i class="fa fa-trash"></i> Delete Selected</button>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2><small>Поиск категорий</small></h2>
                    <form action="" class="search-form">
                        <input type="text" name="search_category" id="search_category" class="search-input" placeholder="Введите название категории">
                    </form>
                    <div id="search_results"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <div class="nav-box">
                                    <p class="text-muted font-13 m-b-30">
                                        Categories {{--<code>$().DataTable();</code>--}}
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
                                                    <a class="dropdown-item" href="{{ route('admin.category.create') }}">Add category</a>
                                                </div>
                                            </li>

                                        </ul>
                                </div>
                                <form action="{{ route('admin.category.handleBulkActions') }}" method="post">
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
                                            <th>Select</th>
                                            <th>Position</th>
                                            <th>Title</th>
                                            <th>Seo Title</th>
                                            <th>Seo Description</th>
                                            <th>Meta keywords</th>
                                            <th>Created date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($categories as $category)
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox" name="selected_category[]" value="{{ $category->id }}">
                                                    </label>
                                                </td>
                                                <td>{{ $category->id }}</td>
                                                <td><a href="{{ route('admin.category.show', $category->id) }}">{{ $category->title }}</a></td>
                                                <td>{{ $category->seo_title }}</td>
                                                <td>{{ Str::limit($category->seo_description, 50) }}</td>
                                                <td>{{ Str::limit($category->meta_keywords, 50) }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="btn-wrapper">
                                        <button type="submit" class="action-btn" name="action" value="edit"><i class="fa fa-edit"></i> Edit Selected</button>
                                        <button type="submit" class="action-btn" name="action" value="delete" style="color: red"><i class="fa fa-trash"></i> Delete Selected</button>
                                    </div>
                                </form>
                                <div class="links">
                                    {{ $categories->links() }}
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
