<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href={{'dashboard'}} class="text-nowrap logo-img">
                <img src="{{asset('Modernize/src/assets/images/logos/app-development.png')}}" width="180" alt="" />
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
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href={{'dashboard'}} aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href={{'posts'}} aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                        <span class="hide-menu">Data Mahasiswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href={{'fakultas'}} aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                        <span class="hide-menu">Fakultas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href={{'prodi'}} aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                        <span class="hide-menu">Prodi</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
