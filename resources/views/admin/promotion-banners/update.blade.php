@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small>Баннер Акций</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="dropdown" style="padding-right: 15px;">
                                <a href="#" class="dropdown-toggle" style="color: #5A738E; font-size: 16px"
                                   data-toggle="dropdown" role="button" aria-expanded="true"><i
                                        class="fa fa-language"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" hreflang="{{ $localeCode }}"
                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
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
                                    <form action="{{ route('admin.promotion-banner.update', $banner->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                        @method('patch')
                                        @csrf
                                        <table id="datatable-checkbox"
                                               class="table table-striped table-bordered bulk_action"
                                               style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Заголовок</th>
                                                <th>Картинка</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    @error('title')
                                                    <code>{{ $message }}</code>
                                                    @enderror
                                                    <label>
                                                        <input type="text" value="{{ $banner->title ?? '' }}"
                                                               name="title" class="updateSelected" placeholder="Заголовок">
                                                    </label>
                                                </td>
                                                @error('address')
                                                <code>{{ $message }}</code>
                                                @enderror
                                                <td>
                                                    @error('image')
                                                    <code>{{ $message }}</code>
                                                    @enderror
                                                    <img src="{{ asset($banner->image ?? '')}}" alt="" style="width: 70px">
                                                    <label>
                                                        <input type="file" value="" name="image" class="updateSelected">
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
    @push('scripts')
        <script type="text/javascript">

            var i = 0;

            $("#add").click(function () {

                ++i;

                $("#datatable-checkbox").append('' +
                    '<tr>' +
                    '<td>' +
                    '<input type="text" name="addmore[' + i + '][title]" placeholder="Назавние" class="updateSelected" />' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="addmore[' + i + '][seo_title]" placeholder="Seo назавние" class="updateSelected" />' +
                    '</td>' +
                    '<td>' +
                    '<textarea type="text" name="addmore[' + i + '][description]" placeholder="Описание" class="updateSelected"></textarea>' +
                    '</td>' +
                    '<td>' +
                    '<textarea type="text" name="addmore[' + i + '][seo_description]" placeholder="Seo Описание" class="updateSelected"></textarea>' +
                    '</td>' +
                    '<td>' +
                    '<textarea type="text" name="addmore[' + i + '][meta_keywords]" placeholder="Мета ключи" class="updateSelected"></textarea>' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-danger remove-tr">Убрать</button>' +
                    '</td>' +
                    '</tr>');
            });

            $(document).on('click', '.remove-tr', function () {
                $(this).parents('tr').remove();
            });

        </script>
    @endpush
@endsection
