<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url ( 'images/admin_images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Shopping Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url ('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image )}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucwords(Auth::guard('admin')->user()->name )}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/admin/dashboard')}}" class="nav-link {{ $page == 'admin_dashboard' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ ($page == 'update-admin-password' || $page == 'update-admin-details' ) ? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-sliders-h"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item  ">
                <a href="{{ url('/admin/settings')}}" class="nav-link {{ $page == 'update-admin-password' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/update-admin-details')}}" class="nav-link {{ $page == 'update-admin-details' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DasUpdate Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/dashboard')}}" class="nav-link {{ $page == 'catalogues' ? 'active' : ''}}">
              <i class="far fa-list-alt"></i>
              <p>Catalogues</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/sections')}}" class="nav-link {{ $page == 'sections' ? 'active' : ''}}">
              <i class="fas fa-cubes"></i>
              <p>Sections</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/dashboard')}}" class="nav-link {{ $page == 'categories' ? 'active' : ''}}">
              <i class="fa fa-list-alt" aria-hidden="true"></i>
              <p>Categories</p>
            </a>
          </li>

        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>