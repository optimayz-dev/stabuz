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

                                    <h3 style="padding: 8px 0; border-top: 2px solid darkgray">{{ $subcategory->title }}</h3>
                                    <form action="{{ route('admin.editCategories') }}" method="get">
                                        @csrf
                                        <input type="hidden" value="{{ $subcategory->id }}" name="select_catalogs">
                                        <table id="datatable-checkbox{{ $subcategory->id }}" class="table table-striped table-bordered bulk_action" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>Position</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Created date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($subcategory->children as $children)
                                                <tr>
                                                    <th>
                                                        <label>
                                                            <input type="checkbox" name="selected_category[]" value="{{ $children->id }}">
                                                        </label>
                                                    </th>
                                                    <td>{{ $children->id }} / {{ $subcategory->id }}</td>
                                                    <td>{{ $children->title }}</td>
                                                    <td>{{ Str::limit($children->descr, 50) }}</td>
                                                    <td>{{ $children->created_at }}</td>
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
                        <div class="x_content">
                        <div class="table-wrapper">
                            <button class="accordion-toggle action-btn" data-target="{{ $subcategory->id }}" style="">{{ $subcategory->title }}</button>
                            <table class="table table-striped table-bordered bulk_action table-container" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Attributes</th>
                                    <th>Tags</th>
                                    <th>Created date</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($subcategory->products as $product)
                                    <tr>
                                        <td>{{ $product->id }} / {{ $subcategory->id }}</td>
                                        <td>{{ $product->title }}</td>
                                        @if ($product->price)
                                            <td>{{ $product->price->value }} {{ $product->price->currency_code }}</td>
                                        @else
                                            <td>No prices available for this product.</td>
                                        @endif
                                        <td>
                                            @foreach($product->attributes as $attribute)
                                                {{ $attribute->title }} - <span style="font-weight: bold">{{ $attribute->value }}</span> <br>
                                            @endforeach
                                        </td>
                                        {{--                                                    <td>{{ Str::limit($product->description, 50) }}</td>--}}
                                        <td>
                                            @foreach($product->tags as $tag)
                                                {{ $tag->title }}
                                            @endforeach
                                        </td>
                                        <td>{{ $product->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="btn-wrapper">
                                <a class="action-btn" href="{{ route('admin.edit.subcategory-products', $subcategory->id) }}"><i class="fa fa-edit"></i> edit</a>
                                <a class="action-btn" href=""><i class="fa fa-trash"></i> delete</a>
                                <a class="action-btn" href="{{ route('admin.products.export', $subcategory->id) }}">export data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
