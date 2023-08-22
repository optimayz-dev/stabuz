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
                                            Attributes {{--<code>$().DataTable();</code>--}}
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
                                                        <a class="dropdown-item" href="{{ route('admin.attribute.create') }}">Add attribute</a>
                                                    </div>
                                                </li>
                                            </ul>
                                    </div>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('admin.attribute.bulkActions') }}" method="post">
                                        @method('patch')
                                        @csrf
                                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>Position</th>
                                                <th>Title</th>
                                                <th>Value</th>
                                                <th>Created date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($attributes as $attribute)
                                                <tr>
                                                    <td>
                                                        <label>
                                                            <input type="checkbox" name="selected_attribute[]" value="{{ $attribute->id }}">
                                                        </label>
                                                    </td>
                                                    <td>{{ $attribute->id }}</td>
                                                    <td><a href="{{ route('admin.attribute.show', $attribute->id) }}">{{ $attribute->title }}</a></td>
                                                    <td>{{ $attribute->value }}</td>
                                                    <td>{{ $attribute->created_at }}</td>
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
