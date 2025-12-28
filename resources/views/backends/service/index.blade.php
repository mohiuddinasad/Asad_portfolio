@extends('backends.layout')
@section('backend_content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Services</h4>
                <a href="{{ route('dashboard.service.service.create') }}" class="btn btn-primary">Add Service</a>
            </div>
            <div class="card-body mt-2">
                <div class="row justify-content-between">
                    @forelse ($services as $service)
                        <div  class="card col-lg-4 col-md-12 p-0 position-relative" aria-hidden="true">
                            <img style="height: 200px; object-fit: cover;" src="{{ asset('storage/' . $service->image) }}" class="img-fluid card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->title }}</h5>
                                <p class="card-text">{{ $service->short_description }}</p>
                            </div>

                            <div class="position-absolute top-0 end-0 m-2">
                                <a href="{{ route('dashboard.service.service.edit', $service->id) }}"
                                    class="btn btn-sm btn-warning"><iconify-icon icon="iconamoon:edit" width="20"
                                        height="20"></iconify-icon></a>
                                <a href="{{ route('dashboard.service.service.delete', $service->id) }}"
                                    class="btn btn-sm btn-danger"><iconify-icon icon="material-symbols:delete-rounded"
                                        width="20" height="20"></iconify-icon></a>
                            </div>
                        </div>
                    @empty
                        <h4 class="text-danger text-center">No services available.</h4>
                    @endforelse
                </div>
            </div>
        </div>
@endsection
