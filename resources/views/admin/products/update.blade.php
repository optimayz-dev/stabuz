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
                                    <a class="dropdown-item" href="{{ route('admin.product.create') }}">Create catalog</a>
                                    <a class="dropdown-item" href="{{ route('admin.editCategories') }}">Edit all</a>
                                </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <form action="{{ route('admin.updateProducts') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="card-box table-responsive">
                                    <p class="text-danger font-13 m-b-30">
                                        При обновление данных, следует выбрать нужную языковую версию:
                                        <select name="getlocale" class="change-locale">
                                                <option value="{{ \Illuminate\Support\Facades\App::currentLocale() }}" selected>{{ \Illuminate\Support\Facades\App::currentLocale() }}</option>
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <option value="{{ $properties['native'] }}">{{ $properties['native'] }}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif


                                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Position</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Soe title</th>
                                            <th>Seo Description</th>
                                            <th>Meta keywords</th>
                                            <th>Crated at / Updated at</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input readonly value="{{ $product->id }}" name="id[]" class="updateSelected" style="background: none; border: none">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        <input type="text" value="{{ $product->title }}" name="title_{{ $product->id }}" class="updateSelected">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        <textarea name="description_{{ $product->id }}" class="updateSelected">{{ $product->description }}</textarea>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        <input type="text" value="{{ $product->seo_title }}" name="seo_title_{{ $product->id }}" class="updateSelected">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        <textarea name="seo_description_{{ $product->id }}" class="updateSelected">{{ $product->seo_description }}</textarea>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        <textarea name="meta_keywords_{{ $product->id }}" class="updateSelected">{{ $product->meta_keywords }}</textarea>
                                                    </label>
                                                </td>
                                                <td>{{ $product->created_at }} /<br> {{ $product->updated_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        <button type="submit" class="btn btn-success">update</button>
                                    </div>

                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

