@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small>FAQ</small></h2>
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

{{--                            <li class="dropdown" style="padding-right: 15px;">--}}
{{--                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <a class="dropdown-item" href="{{ route('admin.catalog.index') }}">All catalogs</a>--}}
{{--                                    <a class="dropdown-item" href="{{ route('admin.catalog.create') }}">Create catalog</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}

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
                                    <form action="{{ route('admin.faq.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action" style="width:100%">
                                            <thead>
                                            <tr>

                                                <th>Вопрос</th>
                                                <th>Ответ</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        @error('question')
                                                            <code>{{ $message }}</code>
                                                        @enderror
                                                        <label>
                                                            <input type="text" value="" name="question" class="updateSelected" placeholder="Вопрос">
                                                        </label>
                                                    </td>
                                                    @error('answer')
                                                        <code>{{ $message }}</code>
                                                    @enderror
                                                    <td>
                                                        <label>
                                                            <input type="text" value="" name="answer" class="updateSelected" placeholder="Ответ">
                                                        </label>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="btn-wrapper">
                                            <button type="submit" class="btn btn-success">Создать</button>
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
                            '<input type="text" name="addmore['+i+'][title]" placeholder="Назавние" class="updateSelected" />' +
                        '</td>' +
                        '<td>' +
                            '<input type="text" name="addmore['+i+'][seo_title]" placeholder="Seo назавние" class="updateSelected" />' +
                        '</td>' +
                        '<td>' +
                            '<textarea type="text" name="addmore['+i+'][description]" placeholder="Описание" class="updateSelected"></textarea>' +
                        '</td>' +
                        '<td>' +
                            '<textarea type="text" name="addmore['+i+'][seo_description]" placeholder="Seo Описание" class="updateSelected"></textarea>' +
                        '</td>' +
                        '<td>' +
                            '<textarea type="text" name="addmore['+i+'][meta_keywords]" placeholder="Мета ключи" class="updateSelected"></textarea>' +
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
