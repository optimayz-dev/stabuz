@extends('admin.__layouts.layout')
@section('content')
    <!-- top navigation -->
    <div class="top_nav">
        <div class="nav_menu">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            <img src="images/img.jpg" alt="">John Doe
                        </a>
                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"  href="javascript:;"> Profile</a>
                            <a class="dropdown-item"  href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Settings</span>
                            </a>
                            <a class="dropdown-item"  href="javascript:;">Help</a>
                            <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </div>
                    </li>

                    <li role="presentation" class="nav-item dropdown open">
                        <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-green">6</span>
                        </a>
                        <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                            <li class="nav-item">
                                <a class="dropdown-item">
                                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                    <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                                    <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item">
                                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                    <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                                    <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item">
                                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                    <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                                    <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item">
                                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                    <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                                    <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <div class="text-center">
                                    <a class="dropdown-item">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- /top navigation -->
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
