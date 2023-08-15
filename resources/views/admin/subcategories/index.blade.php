@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small>Поиск под-категории</small></h2>
                        <form action="">
                            <input type="text" name="search" id="search" class="search-input" placeholder="Введите название под-категории">
                        </form>
                        <div id="result">
                            <div id="list-container">
{{--                                 Здесь будут отображаться результаты поиска --}}
                            </div>
                        </div>

                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <div class="nav-box">
                                        <p class="text-muted font-13">
                                            Под-категории и продукты
                                        </p>
                                        <ul class="nav navbar-right">
                                            <li class="dropdown">
                                                <!-- Например, для переключения между USD, EUR и RUB -->
                                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px" data-toggle="dropdown" role="button" aria-expanded="true">
                                                    <i class="fa fa-usd"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    {{--                                                    <a href="{{ route('set_currency', ['currency' => 'usd']) }}">USD</a>--}}
                                                    {{--                                                    <a href="{{ route('set_currency', ['currency' => 'eur']) }}">EUR</a>--}}
                                                    {{--                                                    <a href="{{ route('set_currency', ['currency' => 'rub']) }}">RUB</a>--}}
                                                </div>
                                            </li>
                                            <li class="dropdown" style="padding-right: 15px;">
                                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px" data-toggle="dropdown" role="button" aria-expanded="true">
                                                    <i class="fa fa-language"></i>
                                                </a>
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
                                                    <a class="dropdown-item" href="{{ route('admin.product.create') }}">Add products</a>
                                                    <a class="dropdown-item" href="{{  route('admin.editCategories') }}">Edit</a>
                                                    <a class="dropdown-item" href="{{ route('admin.products.view') }}">Export/Import</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    @foreach($subcategories as $subcategory)
                                        <div class="table-wrapper">


                                        <button class="accordion-toggle action-btn" data-target="{{ $subcategory->id }}" style="">{{ $subcategory->title }}</button>
                                        <table id="datatable-checkbox{{ $subcategory->id }}" class="table table-striped table-bordered bulk_action table-container" style="width:100%;">
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
                                    @endforeach
                                    <div class="links">
                                        {{ $subcategories->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


@endsection
