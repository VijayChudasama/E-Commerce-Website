<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
         .list-colors{
            color: rgb(0, 0, 0);
        }

        .list-colors:hover {
            color: {{ $appSetting->color ?? ' ' }};
        }

        .sidebar .nav .nav-item .nav-link i{
            color: rgb(0, 0, 0);
        }

        .sidebar .nav .nav-item .nav-link i:hover {
            color: {{ $appSetting->color ?? ' ' }};

        }
        .sidebar .nav:not(.sub-menu) > .nav-item:hover > .nav-link{
            color: {{ $appSetting->color ?? ' ' }};
        }
        .sidebar .nav .nav-item.active > .nav-link i{
            color: rgb(0, 0, 0);

        }
     </style>
</head>

<body>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav" style="position: fixed">
            <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-list">Dashboard</span>
                    <i class="list-colors"></i>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/orders') ? 'active' : '' }}">
                <a class="nav-link"  href="{{ url('admin/orders') }}">
                    <i class="mdi mdi-emoticon menu-icon"></i>

                    <span class="menu-list">Orders</span>
                    <i class="list-colors"></i>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/category') }}"
                    aria-expanded="{{ Request::is('admin/category*') ? 'true' : 'false' }}">
                    <i class="mdi mdi-view-headline menu-icon"></i>

                    <span class="list-colors">Category</span>
                    <i class="list-colors"></i>
                </a>
                <div class="collapse {{ Request::is('admin/category*') ? 'show' : '' }}" id="ui-basic1">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}"
                                href="{{ url('admin/category/create') }}">Add category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active' : '' }}"
                                href="{{ url('admin/category') }}">View category</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ Request::is('admin/products*') ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2"
                    aria-expanded="{{ Request::is('admin/products*') ? 'true' : 'false' }}">
                    <i class="mdi mdi-plus-circle" style="font-size: 15px"></i>
                    <span class="list-colors" style="margin-left: 18px">Products</span>
                    <i class="list-colors"></i>
                </a>
                <div class="collapse {{ Request::is('admin/products*') ? 'show' : '' }}" id="ui-basic2">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/products/create') ? 'active' : '' }}"
                                href="{{ url('admin/products/create') }}">Add Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('admin/products') || Request::is('admin/products/*/edit') ? 'active' : '' }}"
                                href="{{ url('admin/products') }}">View Products</a>
                        </li>

                    </ul>
                </div>
            </li>




            <li class="nav-item {{ Request::is('admin/brands') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/brands') }}">
                    <i class="mdi mdi-briefcase-check" style="font-size: 15px"></i>

                    <span class="list-colors" style="margin-left: 18px">Brands</span>
                    <i class="list-colors"></i>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/colors') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/colors') }}">
                    <i class="mdi mdi-briefcase-check" style="font-size: 15px"></i>

                    <span class="list-colors" style="margin-left: 18px">Colors</span>
                    <i class="list-colors"></i>
                </a>
            </li>

            <li class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic3"
                    aria-expanded="{{ Request::is('admin/users*') ? 'true' : 'false' }}">
                    <i class="mdi mdi-account-multiple-plus" style="font-size: 15px"></i>

                    <span class="list-colors" style="margin-left: 18px">Users</span>
                    <i class="list-colors"></i>
                </a>
                <div class="collapse {{ Request::is('admin/users*') ? 'show' : '' }}" id="ui-basic3">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('admin/users/create') ? 'active' : '' }}"> <a
                                class="nav-link" href={{ url('admin/users/create') }}>Add User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('admin/users') || Request::is('admin/users/*/edit') ? 'active' : '' }}"
                                href="{{ url('admin/users') }}">View Users</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item {{ Request::is('admin/sliders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/sliders') }}">
                    <i class="mdi mdi-home" style="font-size: 15px"></i>
                    <span class="list-colors" style="margin-left: 18px">Home slider</span>
                    <i class="list-colors"></i>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/about_us') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/about_us') }}">
                    <i class="mdi mdi-details" style="font-size: 15px"></i>
                    <span class="list-colors" style="margin-left: 18px">About_us</span>
                    <i class="list-colors"></i>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/contact') }}">
                    <i class="mdi mdi-phone" style="font-size: 15px"></i>
                    <span class="list-colors" style="margin-left: 18px">Contact_us</span>
                    <i class="list-colors"></i>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/settings') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/settings') }}">
                    <i class="mdi mdi-settings" style="font-size: 15px"></i>

                    <span class="list-colors" style="margin-left: 18px">Site Setting</span>
                    <i class="list-colors"></i>
                </a>
            </li>

        </ul>
    </nav>
</body>

</html>
