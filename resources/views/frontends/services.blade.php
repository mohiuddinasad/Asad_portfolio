@extends('frontends.layout')
@section('frontend_content')
    
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
                                <img class="img-fluid" src="{{ asset($service->image) }}" alt>
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
@endsection
