@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small>Статичный текст для продуктов</small></h2>
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
                                    <form action="{{ route('admin.static-text-product.update', $staticText->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
                                            <thead>
                                            <tr>

                                                <th>Заголовок</th>
                                                <th>Seo title</th>
                                                <th>Seo title h1</th>
                                                <th>Seo текст</th>
                                                <th>Meta keywords</th>
                                                <th>Meta description</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    @error('title')
                                                    <code>{{ $message }}</code>
                                                    @enderror
                                                    <label>
                                                        <input type="text" value="{{ $staticText->title}}" name="title" class="updateSelected">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        <input type="text" value="{{ $staticText->seo_title ?? '' }}" name="seo_title" class="updateSelected" >
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        <input type="text" value="{{ $staticText->seo_title_h1 ?? '' }}" name="seo_title_h1" class="updateSelected" >
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        <textarea name="seo_text" class="updateSelected" >{{ $staticText->seo_text ?? '' }}</textarea>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        <textarea type="text" name="meta_keywords"  class="updateSelected">{{ $staticText->meta_keywords ?? '' }}</textarea>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        <textarea type="text" name="meta_description"  class="updateSelected">{{ $staticText->meta_description ?? '' }} </textarea>
                                                    </label>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
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