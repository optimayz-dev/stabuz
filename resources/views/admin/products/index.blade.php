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
                        <h2><small>Поиск продуктов</small></h2>
                        <form action="">
                            <input type="text" name="search" id="search" class="search-input" placeholder="Введите название продукта">
                        </form>
                        <div id="result">
                            <div id="list-container">
                                <!-- Здесь будут отображаться результаты поиска -->
                            </div>
                        </div>

{{--                        <div class="clearfix"></div>--}}
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <div class="nav-box">
                                        <p class="text-muted font-13">
                                            Products
                                        </p>
{{--                                        <form action="">--}}
{{--                                            <select name="" id="">--}}
{{--                                                <option value="">catalog</option>--}}
{{--                                                <option value="">catalog2</option>--}}
{{--                                            </select>--}}
{{--                                            <select name="" id="">--}}
{{--                                                <option value="">category</option>--}}
{{--                                                <option value="">category2</option>--}}
{{--                                            </select>--}}
{{--                                            <select name="" id="">--}}
{{--                                                <option value="">subcategory</option>--}}
{{--                                                <option value="">subcategory2</option>--}}
{{--                                            </select>--}}
{{--                                        </form>--}}
                                        <ul class="nav navbar-right">
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
                                                    <a class="dropdown-item" href="{{ route('admin.product.create') }}">Add products</a>
                                                    <a class="dropdown-item" href="{{  route('admin.editCategories') }}">Edit</a>
                                                    <a class="dropdown-item" href="{{ route('admin.products.view') }}">Export/Import</a>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>

                                    @foreach($subcategories as $subcategory)
                                        <h3 style="padding: 8px 0; border-top: 2px solid darkgray">{{ $subcategory->title }}</h3>
                                            <table id="datatable-checkbox{{ $subcategory->id }}" class="table table-striped table-bordered bulk_action" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>
                                                    <th>Select</th>

                                                    <th>Position</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
{{--                                                    <th>Age</th>--}}
                                                    <th>Created date</th>
                                                    {{--                                            <th>Действие</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($subcategory->products as $product)
                                                    <tr>
                                                        <td>
                                                        <th>
                                                            <label>
                                                                <input type="checkbox" name="selected_category[]" value="{{ $product->id }}">
                                                            </label>
                                                        </th>
                                                        <td>{{ $product->id }} / {{ $subcategory->id }}</td>
                                                        <td>{{ $product->title }}</td>
                                                        <td>{{ Str::limit($product->descr, 50) }}</td>
{{--                                                        <td>61</td>--}}
                                                        <td>{{ $product->created_at }}</td>
                                                        {{--                                                <td>редактировать</td>--}}
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="btn-wrapper">
                                                <a class="action-btn" href="{{ route('admin.edit.subcategory-products', $subcategory->id) }}"><i class="fa fa-edit"></i> edit</a>
                                                <a class="action-btn" href=""><i class="fa fa-trash"></i> delete</a>
                                                <a class="action-btn" href="{{ route('admin.products.export', $subcategory->id) }}">export data</a>
                                            </div>
                                    @endforeach
                                    <div class="links">
                                        {{ $subcategories->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
