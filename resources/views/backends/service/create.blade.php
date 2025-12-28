@extends('backends.layout')
@push('backend_css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
@endpush
@section('backend_content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>create Service</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('dashboard.service.service.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                        </div>

                        <div class="col-lg-6 ">
                            <label for="product_details">Uploaded Images : </label>
                            <input name="image" multiple type="file" class="images form-control p-2">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Features</label>
                            <div id="features-container">
                                @if(old('features'))
                                    @foreach(old('features') as $key => $feature)
                                        <div class="input-group mb-2 feature-item">
                                            <input type="text" class="form-control" name="features[]" value="{{ $feature }}"
                                                placeholder="Enter feature">
                                            <button type="button" class="btn btn-danger remove-feature">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="input-group mb-2 feature-item">
                                        <input type="text" class="form-control" name="features[]" placeholder="Enter feature">
                                        <button type="button" class="btn btn-danger remove-feature">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-success" id="add-feature">
                                <i class="fas fa-plus"></i> Add Feature
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="short_description" class="form-label">Short Description</label>
                        <textarea class="form-control" id="short_description" name="short_description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Service</button>
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
                        alert('At least one feature field is required!');
                    }
                }
            });
        });
    </script>
@endpush 