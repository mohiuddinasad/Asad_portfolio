@extends('frontends.layout')
@section('frontend_content')



    <!-- Portfolio Section -->


    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title pb-2" data-aos="fade-up">
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

            </div>

        </div>

    </section><!-- /Portfolio Section -->
@endsection
