<aside class="sidebar" id="sidebar">
    <div class="sidebar-top">
        <a class="brand" href="{{ route('admin.dashboard') }}" aria-label="FM Barbershop Admin">
            <img class="brand-logo" src="{{ asset('assets-admin/images/logo.png') }}" alt="FM Barbershop">
            <span class="brand-copy"><small>Admin Panel</small></span>
        </a>
        <button class="icon-btn sidebar-close" id="sidebarClose" type="button"
            aria-label="Tutup sidebar">&times;</button>
    </div>
    <nav class="sidebar-nav">
        <div class="nav-section">
            <div class="nav-label">Dashboard</div>
            <a class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}"><span class="nav-icon">⌂</span><span>Ringkasan</span></a>
        </div>
        <div class="nav-section">
            <div class="nav-label">Data Master</div>
            <a class="nav-item {{ request()->routeIs('admin.pelanggan.*') ? 'active' : '' }}"
                href="{{ route('admin.pelanggan.index') }}"><span class="nav-icon">♙</span><span>Pelanggan</span></a>
            <a class="nav-item {{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}"
                href="{{ route('admin.layanan.index') }}"><span class="nav-icon">✂</span><span>Layanan</span></a>
            <a class="nav-item {{ request()->routeIs('admin.barber.*') ? 'active' : '' }}"
                href="{{ route('admin.barber.index') }}"><span class="nav-icon">♟</span><span>Barber</span></a>
            <a class="nav-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}"
                href="{{ route('admin.user.index') }}">
                <span class="nav-icon">♙</span>
                <span>User</span>
            </a>
            <a class="nav-item {{ request()->routeIs('admin.pertanyaan.index') ? 'active' : '' }}"
                href="{{ route('admin.pertanyaan.index') }}"><span class="nav-icon">✉</span><span>Pesan Masuk</span></a>
        </div>
        <div class="nav-section">
            <div class="nav-label">Navigasi</div>
            <a class="nav-item" href="{{ route('guest.home') }}" target="_blank" rel="noopener"><span
                    class="nav-icon">↗</span><span>Lihat Website Guest</span></a>
        </div>
    </nav>
    <div class="sidebar-user">
        <div class="avatar">FM</div>
        <div class="user-info"><strong>Administrator</strong><span>FM Barbershop</span></div>
        <button class="user-menu-btn" type="button" id="userMenuButton" aria-label="Menu administrator">⋮</button>
        <div class="user-menu" id="userMenu" hidden>
            <a href="{{ route('guest.home') }}" target="_blank" rel="noopener">Buka halaman Guest</a>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </div>
    </div>
</aside>
<div class="sidebar-overlay" id="sidebarOverlay"></div>
