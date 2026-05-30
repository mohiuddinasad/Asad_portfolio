@extends('backends.layout')

@section('backend_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Pricing Plan</h4>
                    <a href="{{ route('dashboard.pricing.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('dashboard.pricing.update', $pricing->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('title') is-invalid @enderror"
                                           id="title"
                                           name="title"
                                           value="{{ old('title', $pricing->title) }}"
                                           placeholder="e.g., Basic Plan, Pro Plan"
                                           required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="subtitle" class="form-label">Subtitle</label>
                                    <input type="text"
                                           class="form-control @error('subtitle') is-invalid @enderror"
                                           id="subtitle"
                                           name="subtitle"
                                           value="{{ old('subtitle', $pricing->subtitle) }}"
                                           placeholder="e.g., For individuals">
                                    @error('subtitle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('price') is-invalid @enderror"
                                           id="price"
                                           name="price"
                                           value="{{ old('price', $pricing->price) }}"
                                           placeholder="e.g., $29/month, Free, $99"
                                           required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Features</label>
                            <div id="features-container">
                                @php
                                    $features = old('features', $pricing->features ?? []);
                                @endphp

                                @if(count($features) > 0)
                                    @foreach($features as $feature)
                                        <div class="input-group mb-2 feature-item">
                                            <input type="text"
                                                   class="form-control"
                                                   name="features[]"
                                                   value="{{ $feature }}"
                                                   placeholder="Enter feature">
                                            <button type="button" class="btn btn-danger remove-feature">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="input-group mb-2 feature-item">
                                        <input type="text"
                                               class="form-control"
                                               name="features[]"
                                               placeholder="Enter feature">
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

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Pricing Plan
                            </button>
                            <a href="{{ route('dashboard.pricing.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('backend_js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('features-container');
        const addButton = document.getElementById('add-feature');

        // Add new feature field
        addButton.addEventListener('click', function() {
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
        container.addEventListener('click', function(e) {
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
@endsection
