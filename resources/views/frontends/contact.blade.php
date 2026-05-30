@extends('frontends.layout')
@section('frontend_content')
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
                                <p>{{ $user->phone }}</p>
                            </div>
                        </div>
                        <div class="info_item">
                            <div class="icon">
                                <span><iconify-icon icon="tabler:mail" width="24" height="24"></iconify-icon></span>
                            </div>
                            <div class="text">
                                <h5>Email</h5>
                                <p>{{ $user->email }}</p>
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
                            <form class="text-center" id="" method="post"
                                action="{{ route('frontend.contact.store') }}">
                                @csrf

                                <!-- Name -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Your Name">
                                    <label for="name">Your Name</label>

                                </div>

                                <!-- Email -->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" value="{{ old('email') }}"
                                        name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>

                                </div>

                                <!-- Subject -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="subject" value="{{ old('subject') }}"
                                        name="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>

                                </div>

                                <!-- Message -->
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="message" name="message" placeholder="Leave a comment here" style="height: 100px">{{ old('message') }}</textarea>
                                    <label for="message">Message</label>

                                </div>

                                <!-- Submit Button -->
                                <button type="submit" id="submitBtn" class="btn btn-primary">Send Message</button>

                                @if (session('success'))
                                    <p style="color: green;">{{ session('success') }}</p>
                                @endif


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="floating-message" id="floatingMsg"></div>

    </section>
@endsection
