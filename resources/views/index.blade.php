@extends('frontends.layout')
@section('frontend_content')
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
                <a href="https://www.facebook.com/share/1BMLXu62w3/"><iconify-icon icon="ic:baseline-facebook" width="27"
                        height="27"></iconify-icon></a>
                <a href="https://www.instagram.com/mohiuddin_asad_?igsh=ODZ1ZWI4azRjemMz"><iconify-icon icon="mdi:instagram"
                        width="27" height="27"></iconify-icon></a>
                <a
                    href="https://www.linkedin.com/in/mohiuddin-asad-491aa4382?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><iconify-icon
                        icon="mdi:linkedin" width="27" height="27"></iconify-icon></a>
                <a href="https://wa.me/8801761955564?text=Hello"><iconify-icon icon="ic:baseline-whatsapp" width="27"
                        height="27"></iconify-icon></a>
            </div>

            <div class="contract">
                <a class="hire col-sm-12" href="https://wa.me/8801761955564?text=Hello" class="button">Hire
                    Me</a>
                <a class="cv col-sm-12" href="{{ asset('frontend/assets/mohiuddin asad Resume.pdf') }}" Download>Download CV
                </a>
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
                @forelse ($services as $service)
                    <div class="col-lg-4 servise_box">
                        <a href="{{ route('frontend.service.details', $service->slug) }}">
                            <div class="image">
                                <img class="img-fluid" src="{{ asset('storage/' . $service->image) }}" alt>
                            </div>
                            <div class="text d-flex justify-content-center align-items-center">
                                <h4>{{ Str::limit($service->title, 18) }} </h4>
                            </div>
                        </a>
                    </div>
                @empty

                @endforelse

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
                    <a href="{{ route('frontend.projects.all') }}">View More</a>
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
                        @foreach ($faqs as $key => $faq)
                            <div class="faq-item">
                                <h3><span class="num">{{ ++$key  }}.</span> <span>{{ $faq->question }}</span></h3>
                                <div class="faq-content">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->
                        @endforeach


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
                                <span><iconify-icon icon="tdesign:location" width="24" height="24"></iconify-icon></span>
                            </div>
                            <div class="text">
                                <h5>Location</h5>
                                <p>Bahaddarhat, Chittagong, Bangladesh</p>
                            </div>
                        </div>
                        <div class="info_item">
                            <div class="icon">
                                <span><iconify-icon icon="hugeicons:call-02" width="24" height="24"></iconify-icon></span>
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
                                    <input type="text" class="form-control" id="name" name="name" placeholder="your name">
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

@endsection
