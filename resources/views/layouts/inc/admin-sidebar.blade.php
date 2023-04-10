<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text">{{ config('app.name', 'Laravel') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Lists
    </div>
    <li class="nav-item">
        <a class="nav-link" href="/admin/crimes">
            <i class="fas fa-fw fa-list"></i>
            <span>All Reported Crimes</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/unassigned_crimes">
            <i class="fas fa-fw fa-list"></i>
            <span>Unassigned Crimes</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/crimes_under_investigation">
            <i class="fas fa-fw fa-list"></i>
            <span>Crimes Under Investigation</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Reports
    </div>
    <li class="nav-item">
        <a class="nav-link" href="/admin/reported_cases">
            <i class="fas fa-fw fa-list"></i>
            <span>Reported Cases</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/reporters">
            <i class="fas fa-fw fa-list"></i>
            <span>Reporters</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/officers">
            <i class="fas fa-fw fa-list"></i>
            <span>Police Officers</span></a>
    </li>
    <!-- Divider -->
    @if (Auth::user()->role_id == 1)   
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Configurations
    </div>
    <li class="nav-item">
        <a class="nav-link" href="/admin/crime_categories">
            <i class="fas fa-fw fa-list"></i>
            <span>Crime Categories</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/investigating_officers">
            <i class="fas fa-fw fa-list"></i>
            <span>Investigation Officers</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Accounts
    </div>
    <li class="nav-item">
        <a class="nav-link" href="/admin/users">
            <i class="fas fa-fw fa-list"></i>
            <span>Users</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/roles">
            <i class="fas fa-fw fa-list"></i>
            <span>Roles</span></a>
    </li>
    @endif
    @if (Auth::user()->role_id == 3)   
    <!-- Heading -->
    <div class="sidebar-heading">
        Account
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/edit-user/'.Auth::user()->id) }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Profile</span></a>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
