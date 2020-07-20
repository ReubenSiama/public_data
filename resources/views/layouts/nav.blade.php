<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-text mx-3">Mama Public Data</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Data Collection
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ Route::is('add-public-data') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('add-public-data') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Add Public Data</span></a>
    </li>

    <li class="nav-item {{ Route::is('public-data') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('public-data') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Collected Public Data</span></a>
      </li>

    <!-- Nav Item - Tables -->
@if (Auth::user()->role->role_name != 'Data Collector')
    <li class="nav-item {{ Route::is('business-type') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('business-type') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Business Types</span>
        </a>
    </li>

    <li class="nav-item {{ Route::is('reports') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('reports') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Daily Reports</span>
      </a>
  </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
        Roles & Users
    </div>
        <!-- Nav Item - Tables -->
    <li class="nav-item {{ Route::is('get-users') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('get-users') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Users</span>
      </a>
    </li>
    <li class="nav-item {{ Route::is('roles') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('roles') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Roles</span>
        </a>
    </li>
@endif
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>