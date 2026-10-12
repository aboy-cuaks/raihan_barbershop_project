<header class="topbar">
    <div class="topbar-left">
        <button class="icon-btn" id="sidebarToggle" type="button" aria-label="Buka sidebar">☰</button>
        <div class="divider"></div>
        <nav class="topnav">
            <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Ringkasan</a>
            <a class="{{ request()->routeIs('admin.pelanggan.*') ? 'active' : '' }}" href="{{ route('admin.pelanggan.index') }}">Pelanggan</a>
            <a class="{{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}" href="{{ route('admin.layanan.index') }}">Layanan</a>
            <a class="{{ request()->routeIs('admin.barber.*') ? 'active' : '' }}" href="{{ route('admin.barber.index') }}">Barber</a>
        </nav>
    </div>
    <div class="topbar-actions">
        <div class="search-box"><span>⌕</span><input id="globalSearch" type="search" placeholder="Cari di halaman ini..." autocomplete="off"></div>
        <button class="icon-btn" id="themeToggle" type="button" aria-label="Ubah tema">☾</button>
        <div class="profile-wrap">
            <button class="profile-button" type="button" id="profileButton" aria-label="Menu profil"><span class="avatar avatar-small">FM</span></button>
            <div class="profile-menu" id="profileMenu" hidden><div class="profile-heading"><strong>Administrator</strong><span>FM Barbershop</span></div><a href="{{ route('admin.dashboard') }}">Dashboard</a><a href="{{ route('guest.home') }}" target="_blank" rel="noopener">Lihat Guest</a></div>
        </div>
    </div>
</header>
