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
                                    <a class="dropdown-item" href="{{ route('admin.category.create') }}">Add catalog</a>
                                    <a class="dropdown-item" href="{{  route('admin.editCategories') }}">Edit all</a>
                                    <a class="dropdown-item" href="{{  route('admin.categories.addByFile') }}">Export/Import</a>
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
                                        Categories
                                    </p>

                                        <h3 style="padding: 8px 0; border-top: 2px solid darkgray">{{ $catalog->title }}</h3>
                                        <form action="{{ route('admin.editCategories') }}" method="get">
                                            @csrf
                                            <input type="hidden" value="{{ $catalog->id }}" name="select_catalogs">
                                            <table id="datatable-checkbox{{ $catalog->id }}" class="table table-striped table-bordered bulk_action" style="width:100%">
                                                <thead>
                                                <tr>

                                                    <th>Select</th>

                                                    <th>Position</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    {{--                                                    <th>Age</th>--}}
                                                    <th>Created date</th>
                                                    {{--                                            <th>Действие</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($catalog->children as $category)
                                                    <tr>

                                                        <th>
                                                            <label>
                                                                <input type="checkbox" name="selected_category[]" value="{{ $category->id }}">
                                                            </label>
                                                        </th>

                                                        <td>{{ $category->id }} / {{ $catalog->id }}</td>
                                                        <td>{{ $category->title }}</td>
                                                        <td>{{ Str::limit($category->descr, 50) }}</td>
                                                        {{--                                                        <td>61</td>--}}
                                                        <td>{{ $category->created_at }}</td>
                                                        {{--                                                <td>редактировать</td>--}}
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="btn-wrapper">
                                                <button type="submit" class="action-btn"><i class="fa fa-edit"></i> edit selected</button>
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
