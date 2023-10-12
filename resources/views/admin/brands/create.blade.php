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
                                    <a class="dropdown-item" href="{{ route('admin.catalog.index') }}">All catalogs</a>
                                    <a class="dropdown-item" href="{{ route('admin.catalog.create') }}">Create catalog</a>
                                </div>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
                                            <thead>
                                            <tr>

                                                <th>Title</th>
                                                <th>Soe title</th>
                                                <th>Seo Description</th>
                                                <th>Description</th>
                                                <th>Meta keywords</th>
                                                <th>Brand logo</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <label>
                                                        @error('title')
                                                            {{ $message }}
                                                        @enderror
                                                        <input type="text" name="title" class="updateSelected" placeholder="Название">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        @error('seo_title')
                                                            {{ $message }}
                                                        @enderror
                                                        <input type="text" name="seo_title" class="updateSelected" placeholder="Seo название">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        @error('seo_description')
                                                            {{ $message }}
                                                        @enderror
                                                        <textarea name="seo_description" class="updateSelected" placeholder="Seo Описание"></textarea>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        @error('description')
                                                        {{ $message }}
                                                        @enderror
                                                        <textarea name="description" class="updateSelected" placeholder="Seo Описание"></textarea>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        @error('meta_keywords')
                                                            {{ $message }}
                                                        @enderror
                                                        <textarea type="text" name="meta_keywords" placeholder="Мета ключи" class="updateSelected"></textarea>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        @error('brand_logo')
                                                            {{ $message }}
                                                        @enderror
                                                        <input type="file" name="brand_logo" class="updateSelected">
                                                    </label>
                                                </td>
                                            </tr>
                                            <div id="output"></div>

                                            </tbody>
                                        </table>
                                        <div class="d-flex">

                                            <label class="mr-3" for="">Выберите категории брендов <br>
                                                <select id="e1" style="width: 300px;" multiple name="categories_id[]">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </label>

                                            <label for="">Выберите страну бренда <br>
                                                <select id="e3" style="width: 300px;" name="country_id">
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->title }}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>

                                        <div class="btn-wrapper">
                                            <button type="submit" class="btn btn-success">create</button>
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

