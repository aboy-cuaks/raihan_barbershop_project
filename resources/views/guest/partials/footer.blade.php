<footer>
    <div class="footer-area section-bg" data-background="{{ asset('assets-guest/img/gallery/footer_bg.png') }}">
        <div class="container">
            <div class="footer-top footer-padding">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-logo">
                                <a href="{{ route('guest.home') }}">
                                    <img class="fm-logo-footer"
                                        src="{{ asset('assets-guest/img/logo/logo2_footer.png') }}" alt="FM Barbershop">
                                </a>
                            </div>

                            <div class="footer-tittle">
                                <h4>FM Barbershop</h4>
                                <p>Solusi penampilan terbaik untuk Anda.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Navigasi</h4>
                                <ul>
                                    <li><a href="{{ route('guest.home') }}">Beranda</a></li>
                                    <li><a href="{{ route('guest.services') }}">Layanan</a></li>
                                    <li><a href="{{ route('guest.contact') }}">Kontak</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Akun</h4>
                                <ul>
                                    <li><a href="{{ route('guest.auth') }}">Login</a></li>
                                    <li><a href="{{ route('guest.register') }}">Register</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-copy-right">
                    <p>Copyright &copy; {{ date('Y') }} FM Barbershop.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="back-top">
    <a title="Go to Top" href="#">
        <i class="fas fa-level-up-alt"></i>
    </a>
</div>
