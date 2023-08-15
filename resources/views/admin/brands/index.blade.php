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

                            </li>
                            <li class="dropdown" style="padding-right: 15px;">
                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('admin.catalog.create') }}">Add catalog</a>
                                    <a class="dropdown-item" href="{{  route('admin.editSelected') }}">Edit all</a>
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
                                        Brands <a href="{{ route('admin.brand.create') }}">add brand</a>
                                    </p>
                                    <form action="{{ route('admin.editSelected') }}" method="get">
                                        @csrf
                                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>
                                                <th>Select</th>
                                                </th>
                                                <th>Position</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>logo</th>
                                                <th>Created date</th>
                                                <th>Действие</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($brands as $brand)
                                                <tr>
                                                    <td>
                                                    <th><input type="checkbox" name="selected_catalogs[]" value="{{ $brand->id }}"></th>
                                                    </td>
                                                    <td>{{ $brand->id }}</td>
                                                    <td>{{ $brand->title }}</td>
                                                    <td>{{ Str::limit($brand->descr, 50) }}</td>
                                                    <td><div style="width: 480px"><img src="{{ $brand->file_url }}" alt="" style="width: 100%"></div</td>
                                                    <td>{{ $brand->created_at }}</td>
                                                    <td><a href="{{ route('admin.brand.edit', $brand->id) }}">редактировать</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="btn-wrapper">
                                            <button type="submit" class="btn btn-primary">edit selected</button>
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
