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
                                        <p class="text-muted font-13">
                                            Products
                                        </p>
                                        <ul class="nav navbar-right">
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
                                                    <a class="dropdown-item" href="{{ route('admin.product.create') }}">Add products</a>
                                                    <a class="dropdown-item" href="{{  route('admin.editCategories') }}">Edit</a>
                                                    <a class="dropdown-item" href="{{ route('admin.products.view') }}">Export/Import</a>
                                                </div>
                                            </li>

                                        </ul>
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


