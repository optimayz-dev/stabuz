@extends('admin.__layouts.layout')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small>Главный баннер</small></h2>
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
                                    <form action="{{ route('admin.main-banner.update', $banner->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                        @method('patch')
                                        @csrf
                                        <table id="datatable-checkbox"
                                               class="table table-striped table-bordered bulk_action"
                                               style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Заголовок</th>
                                                <th>Тип баннера</th>
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
                                                <td>
                                                    @error('type')
                                                    <code>{{ $message }}</code>
                                                    @enderror
                                                    <label>
                                                        <select name="type" id="" class="select" title="Не выбрано">
                                                            <option value="" @if($banner->type == null) selected @endif></option>
                                                            <option value="1330х400px" @if($banner->type == "1330х400px") selected @endif>Баннер на первом экране: десктоп
                                                                - 1330х400px
                                                            </option>
                                                            <option value="536х270px" @if($banner->type == "536х270px") selected @endif>Баннер на первом экране: мобильный
                                                                - 536х270px
                                                            </option>
                                                            <option value="410х450px"@if($banner->type == "410х450px") selected @endif>Рекламные баннеры на странице:
                                                                левый - 410х450px
                                                            </option>
                                                            <option value="840х450px"@if($banner->type == "840х450px") selected @endif>Рекламные баннеры на странице:
                                                                правый - 840х450px
                                                            </option>
                                                            <option value="536х290px"@if($banner->type == "536х290px") selected @endif>Рекламные баннеры на странице:
                                                                мобильный - 536х290px
                                                            </option>
                                                            <option value="238х420px"@if($banner->type == "238х420px") selected @endif>Рекламные блоки на главной
                                                                странице в категориях 1 вид: Десктоп вертикальный -
                                                                238х420px
                                                            </option>
                                                            <option value="536х220px"@if($banner->type == "536х220px") selected @endif>Рекламные блоки на главной
                                                                странице в категориях 1 вид: Мобильный горизонтальный -
                                                                536х220px
                                                            </option>
                                                            <option value="496х420px"@if($banner->type == "496х420px") selected @endif>Рекламные блоки на главной
                                                                странице в категориях 2 вид: Десктоп - 496х420px
                                                            </option>
                                                            <option value="536х220px"@if($banner->type == "536х220px") selected @endif>Рекламные блоки на главной
                                                                странице в категориях 2 вид: Мобильный - 536x350px
                                                            </option>
                                                        </select>
                                                    </label>
                                                </td>
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
            $('select').selectpicker();
        </script>
    @endpush
@endsection
