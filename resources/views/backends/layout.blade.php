<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Mohiuddin Asad</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('frontend/assets/img/fav icon.png') }}" type="image/x-icon">
    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/tabler-icons.min.css') }}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather.css') }}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/fontawesome.css') }}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/material.css') }}">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style-preset.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

    @stack('backend_css')




</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ route('dashboard') }}" class="b-brand text-primary">
                    <!-- ========   Change your logo from here   ============ -->
                    <img src="{{ asset('frontend\assets\img\logo2.png') }}" alt="logo" class="logo logo-lg">
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item">
                        <a href="{{ route('dashboard') }}" class="pc-link">
                            <span class="pc-micon"><iconify-icon icon="ri:dashboard-line" width="24"
                                    height="24"></iconify-icon></span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('dashboard.pricing.index') }}" class="pc-link">
                            <span class="pc-micon"><iconify-icon icon="carbon:pricing-traditional" width="24"
                                    height="24"></iconify-icon></span>
                            <span class="pc-mtext">Pricing</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('dashboard.service.index') }}" class="pc-link">
                            <span class="pc-micon"><iconify-icon icon="mingcute:service-fill" width="24"
                                    height="24"></iconify-icon></span>
                            <span class="pc-mtext">Service</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('dashboard.review.index') }}" class="pc-link">
                            <span class="pc-micon"><iconify-icon icon="mage:preview-fill" width="24"
                                    height="24"></iconify-icon></span>
                            <span class="pc-mtext">Review</span>
                        </a>
                    </li>






                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">
                            <span class="pc-micon">
                                <iconify-icon icon="carbon:skill-level-basic" width="22" height="22"></iconify-icon>
                            </span>
                            <span class="pc-mtext">Skills</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('dashboard.skills.coding.skill') }}">Coding skill</a></li>
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('dashboard.skills.framework.skill') }}">Framework skill</a>
                            </li>
                        </ul>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('dashboard.faq.list.faq') }}" class="pc-link">
                            <span class="pc-micon"><iconify-icon icon="ic:twotone-question-answer" width="24"
                                    height="24"></iconify-icon></span>
                            <span class="pc-mtext">FAQ</span>
                        </a>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">
                            <span class="pc-micon">
                                <iconify-icon icon="cil:education" width="24" height="24"></iconify-icon>
                            </span>
                            <span class="pc-mtext">Resume</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('dashboard.resume.education') }}">Education</a>
                            </li>
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('dashboard.resume.experience') }}">Experience</a>
                            </li>

                        </ul>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">
                            <span class="pc-micon">
                                <iconify-icon icon="eos-icons:project-outlined" width="24" height="24"></iconify-icon>
                            </span>
                            <span class="pc-mtext">Portfolio</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('dashboard.portfolio.categories.index') }}">Categories</a>
                            </li>
                            <li class="pc-item"><a class="pc-link"
                                    href="{{ route('dashboard.portfolio.projects.index') }}">Projects</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <!-- ======= Menu collapse Icon ===== -->
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="dropdown pc-h-item d-inline-flex d-md-none">
                        <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-search"></i>
                        </a>
                        <div class="dropdown-menu pc-h-dropdown drp-search">
                            <form class="px-3">
                                <div class="form-group mb-0 d-flex align-items-center">
                                    <i data-feather="search"></i>
                                    <input type="search" class="form-control border-0 shadow-none"
                                        placeholder="Search here. . .">
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="pc-h-item d-none d-md-inline-flex">
                        <form class="header-search">
                            <i data-feather="search" class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search here. . .">
                        </form>
                    </li>
                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item">
                        <a style="position: relative;" href="{{ route('dashboard.dashboard.messages') }}"
                            class="pc-head-link me-0 position-relative">
                            <i class="ti ti-mail"></i>
                            @if($unreadCount > 0)
                            <span style="
                            position: absolute;
                            width: 12px;
                            height: 12px;
                            display: flex;
                            font-size: 10px;
                            align-items: center;
                            justify-content: center;
                            top: 6px;
                            right: 4px;" class="pc-badge-label bg-danger rounded-circle">{{ $unreadCount }}</span>

                            @endif
                        </a>

                    </li>
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                            <img src="{{ Auth::user()->user_image ? asset(Auth::user()->user_image) : asset('backend/assets/images/user/avatar-2.jpg') }}"
                                alt="user-image" class="user-avtar">
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header">
                                <div class="d-flex mb-1">
                                    <div class="flex-shrink-0">
                                        <img src="{{ Auth::user()->user_image ? asset(Auth::user()->user_image) : asset('backend/assets/images/user/avatar-2.jpg') }}"
                                            alt="user-image" class="user-avtar wid-35">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">{{ Auth::user()->name }}</h6>
                                        <span>{{ Auth::user()->title }}</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="drp-t1" data-bs-toggle="tab"
                                        data-bs-target="#drp-tab-1" type="button" role="tab" aria-controls="drp-tab-1"
                                        aria-selected="true"><i class="ti ti-user"></i>
                                        Profile</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="mysrpTabContent">
                                <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel"
                                    aria-labelledby="drp-t1" tabindex="0">
                                    <a href="{{ route('dashboard.profile.edit') }}" class="dropdown-item">
                                        <i class="ti ti-edit-circle"></i>
                                        <span>Edit Profile</span>
                                    </a>
                                    <a href="{{ route('dashboard.my.profile') }}" class="dropdown-item">
                                        <i class="ti ti-user"></i>
                                        <span>View Profile</span>
                                    </a>
                                    <a href="{{ route('dashboard.profile.setting') }}" class="dropdown-item">
                                        <i class="ti ti-settings"></i>
                                        <span>Setting</span>
                                    </a>
                                    <a href="{{ route('logout') }}" class="dropdown-item">
                                        <i class="ti ti-power"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            @yield('backend_content')
        </div>
    </div>
    <div id="preloader"></div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">

    </footer>

    <!-- [Page Specific JS] start -->
    <script src="{{ asset('backend/assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/dashboard-default.js') }}"></script>
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="{{ asset('backend/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/feather.min.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>

    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>







    <script>
        layout_change('light');
    </script>




    <script>
        change_box_container('false');
    </script>



    <script>
        layout_rtl_change('false');
    </script>


    <script>
        preset_change("preset-1");
    </script>


    <script>
        font_change("Public-Sans");
    </script>
    @stack('backend_js')



</body>
<!-- [Body] end -->

</html>
