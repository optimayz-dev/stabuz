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
                                    <a class="dropdown-item" href="{{ route('admin.category.create') }}">Add catalog</a>
                                    <a class="dropdown-item" href="{{  route('admin.editCategories') }}">Edit all</a>
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
                                        Product export-import
                                    </p>
                                    <h3 style="padding: 8px 0; border-top: 2px solid darkgray">Products</h3>
                                    <table id="datatable-checkbox1" class="table table-striped table-bordered bulk_action" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Position</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            {{--                                                    <th>Age</th>--}}
                                            <th>Created date</th>
                                            {{--                                            <th>Действие</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td></td>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ Str::limit($product->descr, 50) }}</td>
                                                {{--                                                        <td>61</td>--}}
                                                <td>{{ $product->created_at }}</td>
                                                {{--                                                <td>редактировать</td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="btn-wrapper" style="display: flex">
                                        <form action="{{ route('admin.products.import') }}" method="post" enctype="multipart/form-data" style="margin-right: 20px">
                                            @csrf
                                            <input type="file" name="file">
                                            <button type="submit" class="btn btn-success">import data</button>
                                        </form>
                                        <a class="btn btn-danger" href="{{ route('admin.products.export', 1) }}">export data</a>

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
