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
                                    <a class="dropdown-item" href="{{ route('admin.attribute.index') }}">All attributes</a>
                                    <a class="dropdown-item" href="{{ route('admin.catalog.create') }}">Create attributes</a>
                                </div>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">

                            <div class="col-sm-12">
                                <form action="{{ route('admin.attribute.bulkUpdate') }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <input type="hidden" name="action" value="update">

                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
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
                                    @if(Session::has('attribute_error'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('attribute_error') }}
                                        </div>
                                    @endif
                                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Название</th>
                                                <th>Значение</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($attributes as $attribute)
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="hidden" name="addmore[0][id]" value="{{ $attribute->id }}">
                                                        <input type="text" value="{{ $attribute->title }}" name="addmore[{{ $attribute->id }}][title]" class="updateSelected" placeholder="Название">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        @error('value')
                                                        <div>{{ $message }}</div>
                                                        @enderror
                                                        <input type="text" value="{{ $attribute->value }}" name="addmore[{{ $attribute->id }}][value]" class="updateSelected" placeholder="Значение">
                                                    </label>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="btn-wrapper">
                                            <button type="submit" class="btn btn-success">create</button>
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
