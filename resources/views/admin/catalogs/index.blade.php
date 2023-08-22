@extends('admin.__layouts.layout')
@section('content')
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
                                            Catalogs {{--<code>$().DataTable();</code>--}}
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
                                                        <a class="dropdown-item" href="{{ route('admin.catalog.create') }}">Add catalog</a>
                                                        <a class="dropdown-item" href="{{ route('admin.category.viewImport') }}">Export/Import</a>
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($catalogs as $catalog)
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox" name="selected_category[]" value="{{ $catalog->id }}">
                                                    </label>
                                                </td>
                                                <td>{{ $catalog->id }}</td>
                                                <td><a href="{{ route('admin.category.show', $catalog->id) }}">{{ $catalog->title }}</a></td>
                                                <td>{{ $catalog->seo_title }}</td>
                                                <td>{{ Str::limit($catalog->seo_description, 50) }}</td>
                                                <td>{{ Str::limit($catalog->meta_keywords, 50) }}</td>
                                                <td>{{ $catalog->created_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                        <div class="btn-wrapper">
                                            <button type="submit" class="action-btn" name="action" value="edit"><i class="fa fa-edit"></i> Edit Selected</button>
                                            <button type="submit" class="action-btn" name="action" value="delete" style="color: red"><i class="fa fa-trash"></i> Delete Selected</button>
                                            <a class="action-btn" href="{{ route('admin.category.export') }}"><i class="fa fa-cloud-download"></i> export data</a>
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
