@extends('frontends.layout')
@section('frontend_content')
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
                                <div class="progress" data-percent="{{ $frameworkSkill->percentage }}"
                                    data-color="#0099ff">
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
@endsection