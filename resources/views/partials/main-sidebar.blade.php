
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link">
        <img src="{{ asset('dashboard/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Taghrid</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @permission('dashboard-read')
                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                @lang('global.dashboard')
                            </p>
                        </a>
                    </li>
                @endpermission

                @permission('orders-read')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                @lang('global.orders')
                                <i class="fas fa-angle-left left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('orders.index') }}?type=deactive" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>الطلبات الجديدة</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('orders.index') }}?type=active" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>الطلبات الحالية</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endpermission

                @permission('bills-read')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                @lang('global.bills')
                                <i class="fas fa-angle-left left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- <li class="nav-item">
                                <a href="{{ route('bills.index') }}?type=warehouses" class="nav-link">
                                    <i class="fa fa-home nav-icon"></i>
                                    <p>Warehouses</p>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('bills.index') }}?type=drivers" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>@lang('global.drivers')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endpermission

                @permission('drivers-read')
                    <li class="nav-item">
                        <a href="{{ route('drivers.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>
                                @lang('global.drivers')
                            </p>
                        </a>
                    </li>
                @endpermission

                @permission('warehouses-read')
                    {{-- <li class="nav-item">
                        <a href="{{ route('warehouses.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Warehouse
                            </p>
                        </a>
                    </li> --}}
                @endpermission

                @permission('markets-read')
                    <li class="nav-item">
                        <a href="{{ route('markets.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                @lang('global.markets')
                            </p>
                        </a>
                    </li>
                @endpermission

                @permission('users-read')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                @lang('global.users')
                            </p>
                        </a>
                    </li>
                @endpermission

                @role('market')
                    <li class="nav-item" data-toggle="modal" data-target="#marketOrderModal">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-plus"></i>
                            <p> @lang('global.orders') </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('market.orders') }}" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                @lang('global.orders')
                            </p>
                        </a>
                    </li>
                @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>