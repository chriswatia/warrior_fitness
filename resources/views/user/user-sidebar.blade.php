<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text">{{ config('app.name', 'Laravel') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Actions
    </div>
    <li class="nav-item">
        <a class="nav-link" href="/add-crime">
            <i class="fas fa-fw fa-list"></i>
            <span>Report Crime</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/crimes">
            <i class="fas fa-fw fa-list"></i>
            <span>Reported Crimes</span></a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-list"></i>
            <span>Assigned Crimes</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Account
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('profile/'.Auth::user()->id) }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
