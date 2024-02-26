<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('profile.edit')}}" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                @can('view users')
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                @endcan

                @can('view categories')
                <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                @endcan
                @can('view menuItems')
                <li class="nav-item">
                    <a href="{{route('menu_items.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu Items
                        </p>
                    </a>
                </li>
                @endcan
                @can('view orders')
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('orders.index',['status' => 'pending'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('orders.index',['status' => 'complete'])}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Complete Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('orders.index',['status' => 'expired'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Expired Orders</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
