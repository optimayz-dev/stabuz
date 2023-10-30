@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
{{--                        <h2><small>Plus Table Design</small></h2>--}}
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
                                    <a class="dropdown-item" href="{{ route('admin.product.create') }}">Add product</a>
{{--                                    <a class="dropdown-item" href="">Edit all</a>--}}
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
                                        Импорт брендов
                                    </p>
{{--                                    <h4 style="padding: 8px 0; border-top: 2px solid darkgray">Продукты</h4>--}}
                                    <div class="alert alert-secondary" role="alert">
                                        <p style="font-size: 15px;">
                                            При импорте бренда важно учесть целосность колонок, которые были изначально при экспорте!<br>
                                            Если колонка не будет найдена, система вернет ошибку о недостающей колонки.
                                            Так же данные будут импортированы на текущем языке <span class="text-danger" style="font-size: 17px;">{{ app()->getLocale() }}</span>
                                        </p>
                                    </div>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if(isset($errors) && count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="btn-wrapper" style="display: flex">
                                        <form action="{{ route('admin.brand.import') }}" method="post" enctype="multipart/form-data" style="margin-right: 20px">
                                            @csrf
                                            <input type="file" name="file">
                                            <button type="submit" class="btn btn-success">import data</button>
                                        </form>
{{--                                        <a class="btn btn-danger" href="{{ route('admin.products.export', 1) }}">export data</a>--}}
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
