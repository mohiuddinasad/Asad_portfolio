@extends('frontends.layout')
@section('frontend_content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Service Details</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Service Details</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="services-list">

                        @foreach ($services as $item)
                            <a href="{{ route('frontend.service.details', $item->slug) }}"
                                class="{{ $item->id == $service->id ? 'active' : '' }}">
                                {{ $item->title }}
                            </a>
                        @endforeach


                    </div>

                    <h4>{{ $service->title }}</h4>
                    <p>{{ $service->short_description }}</p>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <img style="width: 100%; height: 380px;" src="{{ asset('storage/' . $service->image) }}" alt=""
                        class="img-fluid services-img rounded-4">
                    <h3>Service Overview</h3>
                    <hr>
                    <p>
                        {{ $service->short_description }}
                    </p>
                    <ul>
                        @php
                            $features = json_decode($service->features, true) ?? [];
                        @endphp
                        @if ((count($features) > 0))
                            @foreach ($features as $feature)
                                <li><i class="bi bi-check-circle"></i> <span>{{ $feature }}</span></li>
                            @endforeach

                        @endif
                    </ul>

                    <p>
                        {{ $service->description }}
                    </p>
                </div>

            </div>

        </div>

    </section><!-- /Service Details Section -->

@endsection
