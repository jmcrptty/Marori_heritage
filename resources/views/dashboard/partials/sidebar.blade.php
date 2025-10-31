<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('/') }}" class="sidebar-brand">Marori Wasur</a>
        <div class="sidebar-subtitle">Content Management</div>
    </div>

    <nav class="sidebar-menu">
        <div class="menu-section-title">Dashboard</div>
        <a href="{{ route('dashboard.index') }}" class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span class="menu-item-text">Overview</span>
        </a>

        <div class="menu-section-title">Content Management</div>

        <a href="{{ route('dashboard.hero') }}" class="menu-item {{ request()->routeIs('dashboard.hero') ? 'active' : '' }}">
            <i class="bi bi-star"></i>
            <span class="menu-item-text">Hero Section</span>
        </a>

        <a href="{{ route('dashboard.products') }}" class="menu-item {{ request()->routeIs('dashboard.products') ? 'active' : '' }}">
            <i class="bi bi-box-seam"></i>
            <span class="menu-item-text">Produk</span>
        </a>

        <a href="{{ route('dashboard.culture') }}" class="menu-item {{ request()->routeIs('dashboard.culture') ? 'active' : '' }}">
            <i class="bi bi-book"></i>
            <span class="menu-item-text">Budaya</span>
        </a>

        <a href="{{ route('dashboard.media') }}" class="menu-item {{ request()->routeIs('dashboard.media') ? 'active' : '' }}">
            <i class="bi bi-image"></i>
            <span class="menu-item-text">Media Gallery</span>
        </a>

        <a href="{{ route('dashboard.researchers') }}" class="menu-item {{ request()->routeIs('dashboard.researchers') ? 'active' : '' }}">
            <i class="bi bi-people"></i>
            <span class="menu-item-text">Tim Peneliti</span>
        </a>

        <a href="{{ route('dashboard.contact') }}" class="menu-item {{ request()->routeIs('dashboard.contact') ? 'active' : '' }}">
            <i class="bi bi-telephone"></i>
            <span class="menu-item-text">Kontak</span>
        </a>

        <div class="menu-section-title">System</div>

        <a href="{{ route('dashboard.admin') }}" class="menu-item {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
            <i class="bi bi-shield-lock"></i>
            <span class="menu-item-text">Kelola Akun Admin</span>
        </a>

        <div class="menu-section-title">Account</div>

        <a href="#" class="menu-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i>
            <span class="menu-item-text">Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</aside>
