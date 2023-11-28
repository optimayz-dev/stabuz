@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small>Статичный текст для категорий</small></h2>
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
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('admin.static-text-category.update', $staticText->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Заголовок</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ $staticText->title ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Seo title</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="seo_title" value="{{ $staticText->seo_title ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Seo title h1</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="seo_title_h1" value="{{ $staticText->seo_title_h1 ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Seo text</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="seo_text">{{ $staticText->seo_text ?? ''}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Meta keywords</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="meta_keywords">{{ $staticText->meta_keywords ?? ''}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Meta description</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="meta_description">{{ $staticText->meta_description ?? ''}}</textarea>
                                        </div>
                                        <div class="btn-wrapper">
                                            <button type="submit" class="btn btn-success">Изменить</button>
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
