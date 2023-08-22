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
                                    <p class="text-muted font-13 m-b-30">
                                        При обновление данных, следует выбрать нужную языковую версию.
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
                                    <form action="{{ route('admin.attribute.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="action" value="create">
                                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Название</th>
                                                <th>Значение</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="text" value="" name="addmore[0][title]" class="updateSelected" placeholder="Название">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label>
                                                        @error('value')
                                                        <div>{{ $message }}</div>
                                                        @enderror
                                                        <input type="text" value="" name="addmore[0][value]" class="updateSelected" placeholder="Значение">
                                                    </label>
                                                </td>
                                                <td>
                                                    <button type="button" name="add" id="add" class="btn btn-success">Добавить</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
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
    @push('scripts')
        <script type="text/javascript">

            var i = 0;

            $("#add").click(function(){

                ++i;

                $("#datatable-checkbox").append('' +
                    '<tr>' +
                    '<td>' +
                    '<input type="text" name="addmore['+i+'][title]" placeholder="Название" class="updateSelected" />' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="addmore['+i+'][value]" placeholder="Значение" class="updateSelected" />' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-danger remove-tr">Убрать</button>' +
                    '</td>' +
                    '</tr>');
            });

            $(document).on('click', '.remove-tr', function(){
                $(this).parents('tr').remove();
            });

        </script>
    @endpush
@endsection
