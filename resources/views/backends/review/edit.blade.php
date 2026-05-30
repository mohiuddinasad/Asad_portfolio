@extends('backends.layout')

@push('backend_css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
@endpush
@section('backend_content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="m-0">Edit Review</h3>
                <a href="{{ route('dashboard.review.index') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.review.update', $review->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="mb-3 col-lg-12">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ $review->name }}" type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="position" class="form-label">Position</label>
                            <input value="{{ $review->position }}" type="text" class="form-control" id="position" name="position"
                                placeholder="Enter position">
                        </div>
                        <div class="mb-3 col-lg-6">
                           <label for="product_details">Uploaded Images : </label>
                            <input name="image" multiple type="file" class="images form-control p-2">
                             @if ($review->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $review->image) }}" alt="Review Image"
                                        style="width: 100px; height: auto;">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-lg-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"
                                placeholder="Enter description">{{ $review->description }}</textarea>
                    </div>

                    <div class="mb-3 col-lg-12">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('backend_js')
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

    <script>
        $('.images').filepond({
            allowMultiple: true,
            storeAsFile: true
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('features-container');
            const addButton = document.getElementById('add-feature');

            // Add new feature field
            addButton.addEventListener('click', function () {
                const featureItem = document.createElement('div');
                featureItem.className = 'input-group mb-2 feature-item';
                featureItem.innerHTML = `
                    <input type="text" class="form-control" name="features[]" placeholder="Enter feature">
                    <button type="button" class="btn btn-danger remove-feature">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                container.appendChild(featureItem);
            });

            // Remove feature field (using event delegation)
            container.addEventListener('click', function (e) {
                if (e.target.closest('.remove-feature')) {
                    const featureItems = container.querySelectorAll('.feature-item');
                    if (featureItems.length > 1) {
                        e.target.closest('.feature-item').remove();
                    } else {
                        alert('At least one feature field is!');
                    }
                }
            });
        });
    </script>
@endpush

