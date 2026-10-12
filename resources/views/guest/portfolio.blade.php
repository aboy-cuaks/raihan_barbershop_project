<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> FM Barbershop | Gallery </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets-guest/img/favicon.ico') }}">

	<!-- CSS here -->
	<link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets-guest/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets-guest/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/animated-headline.css') }}">
	<link rel="stylesheet" href="{{ asset('assets-guest/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('assets-guest/css/fontawesome-all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets-guest/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('assets-guest/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets-guest/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('assets-guest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/branding.css') }}">
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img class="fm-logo-loader" src="{{ asset('assets-guest/img/logo/loder.png') }}" alt="FM Barbershop">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{ route('guest.home') }}"><img class="fm-logo-header" src="{{ asset('assets-guest/img/logo/logo.png') }}" alt="FM Barbershop"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('guest.home') }}">Home</a></li>
                                            <li><a href="{{ route('guest.about') }}">About</a></li>
                                            <li><a href="{{ route('guest.services') }}">Services</a></li>
                                            <li class="active"><a href="{{ route('guest.portfolio') }}">Portfolio</a></li>
                                            <li><a href="{{ route('guest.blog') }}">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('guest.blog') }}">Blog</a></li>
                                                    <li><a href="{{ route('guest.blog-details') }}">Blog Details</a></li>
                                                    <li><a href="{{ route('guest.elements') }}">Element</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('guest.contact') }}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    <a href="{{ route('guest.contact') }}" class="btn header-btn">Book an Appointment</a>
                                </div>
                            </div>
                        </div>   
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-70 text-center">
                                <h2>Portfolio</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--? Gallery Area Start -->
        <div class="gallery-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="box snake mb-30">
                            <div class="gallery-img " style="background-image: url({{ asset('assets-guest/img/gallery/gallery1.png') }});"></div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6">
                        <div class="box snake mb-30">
                            <div class="gallery-img " style="background-image: url({{ asset('assets-guest/img/gallery/gallery2.png') }});"></div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6">
                        <div class="box snake mb-30">
                            <div class="gallery-img " style="background-image: url({{ asset('assets-guest/img/gallery/gallery3.png') }});"></div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="box snake mb-30">
                            <div class="gallery-img " style="background-image: url({{ asset('assets-guest/img/gallery/gallery4.png') }});"></div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery Area End -->
    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="{{ asset('assets-guest/img/gallery/footer_bg.png') }}">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="{{ route('guest.home') }}"><img class="fm-logo-footer" src="{{ asset('assets-guest/img/logo/logo2_footer.png') }}" alt="FM Barbershop"></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">Receive updates and latest news direct from Simply enter.</p>
                                    </div>
                                </div>
                                <div class="footer-number">
                                    <h4><span>+564 </span>7885 3222</h4>
                                    <p>Email resmi akan ditambahkan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Location </h4>
                                    <ul>
                                        <li><a href="#">Advanced</a></li>
                                        <li><a href="#"> Management</a></li>
                                        <li><a href="#">Corporate</a></li>
                                        <li><a href="#">Customer</a></li>
                                        <li><a href="#">Information</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Explore</h4>
                                    <ul>
                                        <li><a href="#">Cookies</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Proparties</a></li>
                                        <li><a href="#">Licenses</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Location</h4>
                                    <div class="footer-pera">
                                        <p class="info1">Subscribe now to get daily updates</p>
                                    </div>
                                </div>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part" novalidate="true">
                                            <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Email Address " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">Send</button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- Footer Social -->
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="{{ asset('assets-guest/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assets-guest/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('assets-guest/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('assets-guest/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('assets-guest/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assets-guest/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('assets-guest/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('assets-guest/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/jquery.sticky.js') }}"></script>
    
    <!-- counter , waypoint,Hover Direction -->
    <script src="{{ asset('assets-guest/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/hover-direction-snake.min.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('assets-guest/js/contact.js') }}"></script>
    <script src="{{ asset('assets-guest/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets-guest/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets-guest/js/jquery.ajaxchimp.min.js') }}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('assets-guest/js/plugins.js') }}"></script>
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>
    
    </body>
</html>