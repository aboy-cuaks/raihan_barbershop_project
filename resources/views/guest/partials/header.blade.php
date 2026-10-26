<header>
    <div class="header-area header-transparent pt-20">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{ route('guest.home') }}">
                                <img class="fm-logo-header" src="{{ asset('assets-guest/img/logo/logo.png') }}"
                                    alt="FM Barbershop">
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li>
                                            <a href="{{ route('guest.home') }}">Beranda</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('guest.about') }}">Tentang Kami</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('guest.services') }}">Layanan</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('guest.portfolio') }}">Portofolio</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('guest.blog') }}">Blog</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('guest.contact') }}">Kontak</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('guest.auth') }}">Login</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('guest.register') }}">Register</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
