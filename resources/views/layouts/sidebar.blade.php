<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KATALOG ALAT MUSIK </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('brand') }}">
            <i class="fas fa-guitar"></i>
            <span>Brand</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori') }}">
            <i class="fas fa-drum"></i>
            <span>Kategori</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('produk') }}">
            <i class="fas fa-music"></i>
            <span>Produk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('join.page') }}">
            <i class="fas fa-microphone"></i>
            <span>Join</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
   

</ul>