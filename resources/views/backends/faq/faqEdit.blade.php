@extends('backends.layout')
@section('backend_content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Edit FAQ</h4>
            <a href="{{ route('dashboard.faq.list.faq') }}" class="btn btn-secondary">Back to List</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <form action="{{ route('dashboard.faq.update.faq', $faq->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="question" class="form-label">Question</label>
                    <input value="{{ $faq->question }}" type="text" class="form-control" id="question" name="question" required>
                </div>
                <div class="mb-3">
                    <label for="answer" class="form-label">Answer</label>
                    <textarea class="form-control" id="answer" name="answer" rows="4" required> {{ $faq->answer }}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
