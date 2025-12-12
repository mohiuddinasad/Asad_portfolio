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

            <a href="index.html" class="logo d-flex align-items-center">
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

    <!-- Hero Section -->

    <section id="hero" data-aos="fade-up">
        <div class="container">
            <div class="contains">
                <span>Hello I am</span>
                @if(Auth::check())
                    <h4>{{ Auth::user()->name }}</h4>
                @else
                    <h4>Mohiuddin Asad</h4>
                @endif
                <h1 class="animated_text"></h1>
                <p class="text">We craft modern, responsive, and user-friendly
                    websites that <br> help your business
                    stand out and
                    grow in the digital world.</p>
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

            <div class="contract">
                <a class="hire col-sm-12" href="https://wa.me/8801761955564?text=Hello" class="button">Hire
                    Me</a>
                <a class="cv col-sm-12" href="{{ asset('frontend/assets/mohiuddin asad Resume.pdf') }}"
                    Download>Download CV </a>
            </div>
        </div>
    </section>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4 align-items-center">
                <div class="col-md-6" data-aos="zoom-in">

                    <div class="col-lg-5">
                       
                            <img src="{{ $user->user_image ? asset($user->user_image) : asset('backend/assets/images/user/avatar-2.jpg') }}"
                                class="img-fluid" alt>
                    

                    </div>
                    <div class="row justify-content-between mt-3">
                        <div class="col-lg-7 about-info p-0">
                            
                                <p><strong>Name: </strong> <span>{{ $user->name }}</span></p>
                            

                            
                                <p><strong>Profile: </strong> <span>{{ $user->title }}</span></p>
                         

                           
                                <p><strong>Email: </strong> <span>{{ $user->email }}</span></p>
                        

                            
                                <p><strong>Phone: </strong> <span>{{ $user->phone }}</span></p>
                            
                       

                        </div>
                        <div class="col-lg-5 about-info p-0">
                          
                                <p><strong>Experience: </strong> <span>{{ $user->experience }} years</span></p>
                          

                                <p><strong>Age: </strong> <span>{{ $user->age }}</span></p>
                        




                            <p><strong>Freelance: </strong> <span>Available</span></p>
                        </div>
                    </div>

                </div>

                <div class="col-md-6" data-aos="zoom-in">
                    <div class="about-me">
                        <h4>About me</h4>
                      
                            <p> <span>{{ $user->description }}</span></p>
                 
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- ========== Start skills ========== -->
    <section id="my_skills" data-aos="fade-right">
        <div class="container">
            <div class="section-title">
                <h2>Skills</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 coding ">
                    <h4>Coding skills</h4>
                    @forelse ($skills as $skill)
                        <div class="progress_bars">
                            <div class="percent d-flex justify-content-between">
                                <p class="m-0">{{ $skill->name }}</p><span>{{ $skill->percentage }}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" data-percent="{{ $skill->percentage }}" data-color="#0099ff">
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse

                </div>
                <div class="col-lg-6 coding ">
                    <h4>Libraries & Frameworks</h4>
                    @foreach ($frameworkSkills as $frameworkSkill)
                        <div class="progress_bars">
                            <div class="percent d-flex justify-content-between">
                                <p class="m-0">{{ $frameworkSkill->name }}</p>
                                <span>{{ $frameworkSkill->percentage }}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" data-percent="{{ $frameworkSkill->percentage }}" data-color="#0099ff">
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- ========== End skills ========== -->

    <!-- Resume Section -->

    <section id="resume">
        <div class="container">
            <!-- Section Title -->
            <div class="section-title" data-aos="fade-up">
                <h2>Resume</h2>

            </div><!-- End Section Title -->
            <div class="row justify-content-between">
                <div class="col-lg-5 education" data-aos="zoom-in">
                    <h4>Education</h4>
                    @foreach ($educations as $education)
                        <div class="education_item">
                            <span>{{ $education->duration }}</span>
                            <h5>{{ $education->title }}</h5>
                            <p>{{ Str::limit($education->description, 150) }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-5 education" data-aos="zoom-in">
                    <h4>Experience</h4>
                    @foreach ($experiences as $experience)
                        <div class="education_item">
                            <span>{{ $experience->duration }}</span>
                            <h5>{{ $experience->title }}</h5>
                            <p>{{ Str::limit($experience->description, 150) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>

    <!-- /Resume Section -->

    <section id="services" data-aos="fade-right">
        <div class="container">
            <div class="contain">
                <div class="container section-title">
                    <h2>Services</h2>
                    <p>I offer a range of services to help you build your online
                        presence.</p>
                </div>

            </div>
            <div class="row justify-content-between boxes">
                <div class="col-lg-4 servise_box">
                    <div class="image">
                        <img class="img-fluid" src="{{ asset('frontend/assets/img/service/1.jpg') }}" alt>
                    </div>
                    <div class="text">
                        <h4>Web Development</h4>
                    </div>
                </div>
                <div class="col-lg-4 servise_box">
                    <div class="image">
                        <img class="img-fluid" src="{{ asset('frontend/assets/img/service/2.jpg') }}" alt>
                    </div>
                    <div class="text">
                        <h4>Responsive Design</h4>
                    </div>
                </div>
                <div class="col-lg-4 servise_box">
                    <div class="image">
                        <img class="img-fluid" src="{{ asset('frontend/assets/img/service/3.jpg') }}" alt>
                    </div>
                    <div class="text">
                        <h4>E-Commerce Development</h4>
                    </div>
                </div>
                <div class="col-lg-4 servise_box">
                    <div class="image">
                        <img class="img-fluid" src="{{ asset('frontend/assets/img/service/5.jpg') }}" alt>
                    </div>
                    <div class="text">
                        <h4>Web Hosting</h4>
                    </div>
                </div>
                <div class="col-lg-4 servise_box">
                    <div class="image">
                        <img class="img-fluid" src="{{ asset('frontend/assets/img/service/4.jpg') }}" alt>
                    </div>
                    <div class="text">
                        <h4>Websites Redesign</h4>
                    </div>
                </div>
                <div class="col-lg-4 servise_box">
                    <div class="image">
                        <img class="img-fluid" src="{{ asset('frontend/assets/img/service/6.jpg') }}" alt>
                    </div>
                    <div class="text">
                        <h4>Website Security & Backup</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Services Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Projects</h2>

        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($categories as $category)
                        <li data-filter=".filter-{{ $category->slug }}">{{ $category->name }}</li>
                    @endforeach
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    @forelse ($projects as $project)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $project->category->slug }}">
                            <img src="{{ asset('storage/projects/' . $project->image) }}" class="img-fluid"
                                alt="{{ $project->title }}">
                            <div class="portfolio-info">
                                <h4>{{ $project->title }}</h4>
                                <p>{{ Str::limit($project->description, 50) }}</p>
                                <a href="{{ asset('storage/projects/' . $project->image) }}" title="{{ $project->title }}"
                                    data-gallery="portfolio-gallery-{{ $project->category->slug }}"
                                    class="glightbox preview-link">
                                    <i class="bi bi-zoom-in"></i>
                                </a>
                                @if($project->link)
                                    <a href="{{ $project->link }}" title="More Details" class="details-link" target="_blank">
                                        <i class="bi bi-link-45deg"></i>
                                    </a>
                                @endif
                            </div>
                        </div><!-- End Portfolio Item -->
                    @empty
                        <div class="col-12 text-center">
                            <p>No projects available yet.</p>
                        </div>
                    @endforelse





                </div><!-- End Portfolio Container -->
                <div class="view_all">
                    <a href="{{ route('projects.all') }}">View More</a>
                </div>
            </div>

        </div>

    </section><!-- /Portfolio Section -->

    <!-- ========== Start pricing ========== -->
    <section id="pricing">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 contain">
                    <h4>
                        Pricing Plans
                    </h4>
                    <p>
                        Stop wasting time and money designing and managing a website
                        that doesn’t get results. Happiness guaranteed!Stop wasting time
                        and money designing and managing a website that doesn’t get
                        results. Happiness guaranteed!
                    </p>
                </div>

                <div class="col-lg-7">
                    <div class="row justify-content-between slider">
                        @foreach ($pricings as $pricing)
                            <div class="col-lg-6 price_box">
                                <div class="details">
                                    <span>{{ $pricing->subtitle }}</span>
                                    <h4>{{ $pricing->title }}</h4>
                                    <h5>${{ $pricing->price }}</h5>
                                    @if($pricing->features && count($pricing->features) > 0)
                                        @foreach($pricing->features as $feature)
                                            <p>{{ $feature }}</p>
                                        @endforeach
                                    @endif
                                    <a href>Get Started</a>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End pricing ========== -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

        <div class="container">

            <div class="row gy-4 align-items-center">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="content px-xl-5">
                        <h3><span>Frequently Asked
                            </span><strong>Questions</strong></h3>
                        <p>
                            Here are a few common questions my clients often ask about my
                            services, workflow, and development process. I hope these
                            answers will give you a clear idea about how I work.
                        </p>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                    <div class="faq-container">
                        <div class="faq-item faq-active">
                            <h3><span class="num">1.</span> <span>What technologies do you
                                    work with?</span></h3>
                            <div class="faq-content">
                                <p>I work with modern web technologies including HTML, CSS,
                                    JavaScript, Bootstrap, Tailwind CSS, PHP, and Laravel to
                                    build professional websites and web applications.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">2.</span> <span>Do you build responsive
                                    websites?</span></h3>
                            <div class="faq-content">
                                <p>Yes, all websites I create are fully responsive and
                                    optimized for mobile, tablet, and desktop devices.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">3.</span> <span>Do you provide support
                                    after the project is delivered?</span></h3>
                            <div class="faq-content">
                                <p>Yes, I provide 1–3 months of free support depending on
                                    the project. Additional maintenance packages are also
                                    available if needed.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">4.</span> <span>Is the website
                                    SEO-friendly?</span></h3>
                            <div class="faq-content">
                                <p>Yes, I follow modern coding standards and basic on-page
                                    SEO practices to make your website SEO-friendly and
                                    fast.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">5.</span> <span>How do we start the
                                    project?</span></h3>
                            <div class="faq-content">
                                <p>You can share your requirements → I will prepare a plan
                                    and timeline → Confirm the budget → Project starts →
                                    Regular updates → Final delivery.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div>
            </div>

        </div>

    </section><!-- /Faq Section -->

    <!-- Testimonials Section -->


    <section id="testimonials" class="testimonials section accent-background">

        <img src="{{ asset('frontend/assets/img/testimonials-bg.jpg') }}" class="testimonials-bg" alt>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('frontend/assets/img/testimonials/testimonials-1.jpg') }}"
                                class="testimonial-img" alt>
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Proin iaculis purus consequat sem cure digni ssim
                                    donec porttitora entum suscipit rhoncus. Accusantium quam,
                                    ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('frontend/assets/img/testimonials/testimonials-2.jpg') }}"
                                class="testimonial-img" alt>
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Export tempor illum tamen malis malis eram quae irure
                                    esse labore quem cillum quid cillum eram malis quorum
                                    velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('frontend/assets/img/testimonials/testimonials-3.jpg') }}"
                                class="testimonial-img" alt>
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Enim nisi quem export duis labore cillum quae magna
                                    enim sint quorum nulla quem veniam duis minim tempor
                                    labore quem eram duis noster aute amet eram fore quis sint
                                    minim.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('frontend/assets/img/testimonials/testimonials-4.jpg') }}"
                                class="testimonial-img" alt>
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Fugiat enim eram quae cillum dolore dolor amet nulla
                                    culpa multos export minim fugiat minim velit minim dolor
                                    enim duis veniam ipsum anim magna sunt elit fore quem
                                    dolore labore illum veniam.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{ asset('frontend/assets/img/testimonials/testimonials-5.jpg') }}"
                                class="testimonial-img" alt>
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Quis quorum aliqua sint quem legam fore sunt eram
                                    irure aliqua veniam tempor noster veniam enim culpa labore
                                    duis sunt culpa nulla illum cillum fugiat legam esse
                                    veniam culpa fore nisi cillum quid.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section>

    <!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container">

            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                    <div class="contact_info">
                        <div class="info_head">
                            <h3>Contact Info</h3>
                            <p>Let’s discuss your project.</p>
                        </div>
                        <div class="info_item">
                            <div class="icon">
                                <span><iconify-icon icon="tdesign:location" width="24"
                                        height="24"></iconify-icon></span>
                            </div>
                            <div class="text">
                                <h5>Location</h5>
                                <p>Bahaddarhat, Chittagong, Bangladesh</p>
                            </div>
                        </div>
                        <div class="info_item">
                            <div class="icon">
                                <span><iconify-icon icon="hugeicons:call-02" width="24"
                                        height="24"></iconify-icon></span>
                            </div>
                            <div class="text">
                                <h5>Phone Number</h5>
                                <p>+8801761955564</p>
                            </div>
                        </div>
                        <div class="info_item">
                            <div class="icon">
                                <span><iconify-icon icon="tabler:mail" width="24" height="24"></iconify-icon></span>
                            </div>
                            <div class="text">
                                <h5>Email</h5>
                                <p>mohiuddinasad46@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 px-5" data-aos="fade-left" data-aos-delay="200">
                    <div class="get_in">
                        <div class="form_head">
                            <h3>Get In Touch</h3>
                            <p>If you have a project in mind or need help with building a
                                website, feel free to reach out. I’m always available to
                                discuss your ideas and help you turn them into reality</p>
                        </div>
                        <div class="input">
                            <form class="text-center" id="contactForm" method="POST" action="">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="your name">
                                    <label for="name">Your Name</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="your email">
                                    <label for="email">Your Email</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="subject" name="subject"
                                        placeholder="subject">
                                    <label for="subject">Subject</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="message" name="message"
                                        placeholder="Leave a comment here" style="height: 100px"></textarea>
                                    <label for="message">Comments</label>
                                </div>

                                <button type="submit" id="submitBtn">Send Message</button>

                                <!-- Success/Error Messages -->
                                <div id="formMessage" style="margin-top: 15px;"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="floating-message" id="floatingMsg"></div>

    </section>

    <!-- /Contact Section -->

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


    <script>
        document.getElementById('contactForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const messageDiv = document.getElementById('formMessage');
            const form = this;

            // Disable button and show loading
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';
            messageDiv.innerHTML = '';

            // Get form data
            const formData = new FormData(form);

            try {
                const response = await fetch('/contact', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    messageDiv.innerHTML = '<div style="color: green; padding: 10px; background: #d4edda; border-radius: 5px;">' + data.message + '</div>';
                    form.reset(); // Clear form
                } else {
                    let errorMsg = data.message || 'Failed to send message.';
                    if (data.errors) {
                        errorMsg += '<br>' + Object.values(data.errors).flat().join('<br>');
                    }
                    messageDiv.innerHTML = '<div style="color: red; padding: 10px; background: #f8d7da; border-radius: 5px;">' + errorMsg + '</div>';
                }
            } catch (error) {
                console.error('Error:', error);
                messageDiv.innerHTML = '<div style="color: red; padding: 10px; background: #f8d7da; border-radius: 5px;">An error occurred. Please try again.</div>';
            } finally {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.textContent = 'Send Message';
            }
        });
    </script>

</body>

</html>
