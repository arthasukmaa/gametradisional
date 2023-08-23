<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ url('public') }}/assets/assets/images/logos/dark-logo.png" width="240" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">LIST MENU</span>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}" href="{{ url('admin/dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link {{ (request()->is('admin/daerah*')) ? 'active' : '' }}" href="{{ url('admin/daerah') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-map"></i>
                        </span>
                        <span class="hide-menu">Data Daerah</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a class="sidebar-link {{ (request()->is('admin/permainan*')) ? 'active' : '' }}" href="{{ url('admin/permainan') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-device-gamepad-2"></i>
                        </span>
                        <span class="hide-menu">Data Permainan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ (request()->is('admin/kuis*')) ? 'active' : '' }}" href="{{ url('admin/kuis') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-ladder"></i>
                        </span>
                        <span class="hide-menu">Data Kuis</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ (request()->is('admin/player*')) ? 'active' : '' }}" href="{{ url('admin/player') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-shirt-sport"></i>
                        </span>
                        <span class="hide-menu">Data Player</span>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
