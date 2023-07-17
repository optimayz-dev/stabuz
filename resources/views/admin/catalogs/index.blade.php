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
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Table design <small>Custom design</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Invoice </th>
                                    <th class="column-title">Invoice Date </th>
                                    <th class="column-title">Order </th>
                                    <th class="column-title">Bill to Name </th>
                                    <th class="column-title">Status </th>
                                    <th class="column-title">Amount </th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($catalogs as $catalog)
                                    <tr class="odd pointer">
                                        <td class="a-center ">
                                            <input type="checkbox" class="flat" name="table_records">
                                        </td>
                                        <td class=" ">121000039</td>
                                        <td class=" ">{{ $catalog->created_at }}</td>
                                        <td class=" ">{{ $catalog->id }} <i class="success fa fa-long-arrow-up"></i>
                                        </td>
                                        <td class=" ">{{ $catalog->title }}</td>
                                        <td class=" ">Paid</td>
                                        <td class="a-right a-right ">$741.20</td>
                                        <td class=" last"><a href="#">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
