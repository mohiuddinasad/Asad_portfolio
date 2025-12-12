@extends('backends.layout')

@section('backend_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Pricing Plans</h4>
                    <a href="{{ route('dashboard.pricing.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Pricing Plan
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($pricings->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Price</th>
                                        <th>Features</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pricings as $key => $pricing)
                                        <tr>
                                            <td>{{ ++$key  }}</td>
                                            <td>{{ $pricing->title }}</td>
                                            <td>{{ $pricing->subtitle ?? 'N/A' }}</td>
                                            <td>{{ $pricing->price }}</td>
                                            <td>
                                                @if($pricing->features && count($pricing->features) > 0)
                                                    <ul class="mb-0">
                                                        @foreach($pricing->features as $feature)
                                                            <li>{{ $feature }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <span class="text-muted">No features</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.pricing.edit', $pricing->id) }}"
                                                   class="btn btn-sm btn-info">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('dashboard.pricing.delete', $pricing->id) }}"
                                                      method="POST"
                                                      class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this pricing plan?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> No pricing plans found.
                            <a href="{{ route('dashboard.pricing.create') }}">Create one now</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
