@extends('backends.layout')
@section('backend_content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>All Reviews</h3>
                <a href="{{ route('dashboard.review.create') }}" class="btn btn-primary">Add New</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $key => $review)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $review->name }}</td>
                            <td>{{ $review->position }}</td>
                            <td>{{ $review->description }}</td>
                            <td>
                                @if($review->image)
                                    <img style="width: 100px" src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->name }}">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <!-- Action buttons can be added here -->
                                <a href="{{ route('dashboard.review.edit', $review->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('dashboard.review.delete', $review->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
