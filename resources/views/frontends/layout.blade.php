<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Mohiuddin Asad</title>
    <meta name="description" content>
    <meta name="keywords" content>

    <!-- Favicons -->
    <link href="{{ asset('frontend/assets/img/fav icon.png') }}" rel="icon">
    <link href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Audiowide&family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.min.css') }}">

    <!-- progress bar  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/progress-bar.css') }}">

    <!-- Main CSS File -->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Asad</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home<br></a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#my_skills">Skills</a></li>
                    <li><a href="#resume">Resume</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Project</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list" data-bs-toggle="offcanvas" href="#offcanvasExample"
                    role="button" aria-controls="offcanvasExample"></i>
            </nav>

        </div>
    </header>

    <main class="main"></main>

    <!-- ========== Start ofcanvas ========== -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Mohiuddin
                Asad</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ">

            <ul class="nav-links p-0" style="list-style: none;">
                <li><a href="#hero" class="nav-link active">Home<br></a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#resume" class="nav-link">Resume</a></li>
                <li><a href="#services" class="nav-link">Services</a></li>
                <li><a href="#portfolio" class="nav-link">Portfolio</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>

        </div>
    </div>
    <!-- ========== End ofcanvas ========== -->


    @yield('frontend_content')

    <footer id="footer">
        <div class="container text-center">
            <div class="logo">
                <h4>Asad</h4>
            </div>
            <div class="link">
                <a href="https://www.facebook.com/share/1BMLXu62w3/"><iconify-icon icon="ic:baseline-facebook"
                        width="27" height="27"></iconify-icon></a>
                <a href="https://www.instagram.com/mohiuddin_asad_?igsh=ODZ1ZWI4azRjemMz"><iconify-icon
                        icon="mdi:instagram" width="27" height="27"></iconify-icon></a>
                <a
                    href="https://www.linkedin.com/in/mohiuddin-asad-491aa4382?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><iconify-icon
                        icon="mdi:linkedin" width="27" height="27"></iconify-icon></a>
                <a href="https://wa.me/8801761955564?text=Hello"><iconify-icon icon="ic:baseline-whatsapp" width="27"
                        height="27"></iconify-icon></a>
            </div>
            <div class="contact d-flex align-items-center justify-content-center">
                <div class="email">
                    <a href="mailto:mohiuddinasad46@gmail.com"><span><iconify-icon icon="ic:outline-email" width="24"
                                height="24"></iconify-icon></span>mohiuddinasad46@gmail.com</a>
                </div>
                <div class="phone">
                    <a href="tel:+8801761955564"><span>
                            <iconify-icon icon="mingcute:phone-line" width="24" height="24"></iconify-icon></span>
                        +8801761955564
                    </a>
                </div>
            </div>
            <hr>
            <p>&copy; {{ date('Y') }} All rights reserved by Mohiuddin Asad.</p>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/side_message/side_message.js') }}"></script>
    <!-- jquery  -->
    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- typer js  -->
    <script src="{{ asset('frontend/assets/js/typer.min.js') }}"></script>
    <!-- prograss bar  -->
    <script src="{{ asset('frontend/assets/js/progress-bar.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slider.js') }}"></script>

    <script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>


    
</body>

</html>
