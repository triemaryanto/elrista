<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img
                                src="{{ asset('limitless/') }}/global_assets/images/placeholders/placeholder.jpg"
                                width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{ auth()->user()->name }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="{{ route('profile') }}" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
                        title="Main"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li
                    class="nav-item nav-item-submenu {{ request()->is('admin/category') || request()->is('admin/product') ? 'nav-item-expanded nav-item-open' : '' }} ">
                    <a href="#" class="nav-link"><i class="icon-database-menu"></i> <span>Product</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Product">
                        <li class="nav-item"><a href="{{ route('product.category') }}"
                                class="nav-link {{ request()->is('admin/category') ? 'active' : '' }}"
                                class="nav-link">Category</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('product') }}"
                                class="nav-link {{ request()->is('admin/product') ? 'active' : '' }}"
                                class="nav-link">Product</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item nav-item-submenu  {{ request()->is('admin/user') || request()->is('admin/role') || request()->is('admin/permission') ? 'nav-item-expanded nav-item-open' : '' }} "">
                    <a href="#" class="nav-link"><i class="icon-people"></i> <span>User
                            management</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="User pages">
                        <li class="nav-item"><a href="{{ route('user') }}"
                                class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}" class="nav-link">User
                                list</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('role') }}"
                                class="nav-link {{ request()->is('admin/role') ? 'active' : '' }}"
                                class="nav-link">Role
                                cards</a></li>
                        <li class="nav-item"><a href="{{ route('permission') }}"
                                class="nav-link {{ request()->is('admin/permission') ? 'active' : '' }}"
                                class="nav-link">Permission</a></li>
                    </ul>
                </li>

                <!-- /page kits -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
