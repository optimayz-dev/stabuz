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
                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('admin.catalog.create') }}">Create catalog</a>
                                    <a class="dropdown-item" href="{{ route('admin.editSelected') }}">Edit all</a>
                                </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('admin.updateSelected') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                <div class="card-box table-responsive">
                                    <p class="text-danger font-13 m-b-30">
                                        При обновление данных, следует выбрать нужную языковую версию:
                                        <select name="getlocale" class="change-locale">@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
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
                                            @foreach($catalogs as $catalog)
                                                <tr>
                                                    <td>
                                                        <label>
                                                            <input readonly value="{{ $catalog->id }}" name="selected_catalogs[]" class="updateSelected" style="background: none; border: none">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label>
                                                            <input type="text" value="{{ $catalog->title }}" name="title_{{ $catalog->id }}" class="updateSelected">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label>
                                                            <textarea name="description_{{ $catalog->id }}" class="updateSelected">{{ $catalog->description }}</textarea>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label>
                                                            <input type="text" value="{{ $catalog->seo_title }}" name="seo_title_{{ $catalog->id }}" class="updateSelected">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label>
                                                            <textarea name="seo_description_{{ $catalog->id }}" class="updateSelected">{{ $catalog->seo_description }}</textarea>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label>
                                                            <textarea name="meta_keywords_{{ $catalog->id }}" class="updateSelected">{{ $catalog->meta_keywords }}</textarea>
                                                        </label>
                                                    </td>
                                                    <td>{{ $catalog->created_at }} /<br> {{ $catalog->updated_at }}</td>
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
        </div>
    </div>


@endsection
