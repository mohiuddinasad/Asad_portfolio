@extends('backends.layout')
@section('backend_content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    FAQ List
                </h4>
                <a href="{{ route('dashboard.faq.create.faq') }}" class="btn btn-primary">Add FAQ</a>
            </div>
            <div class="card-body " style="overflow-x: auto">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $key => $faq)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->answer }}</td>
                                <td>
                                    <!-- Action buttons like Edit/Delete can be added here -->
                                    <a href="{{ route('dashboard.faq.edit.faq', $faq->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('dashboard.faq.delete.faq', $faq->id) }}"
                                        class="btn btn-sm btn-danger">Delete</a>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
