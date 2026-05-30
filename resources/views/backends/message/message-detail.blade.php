@extends('backends.layout')
@push('backend_css')
    <style>
        .back-link {
            color: #007bff;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .info-row {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .info-row label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 100px;
        }

        .message-content {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 4px;
            margin-top: 20px;
            line-height: 1.6;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }

        .delete-btn:hover {
            background: #c82333;
        }
    </style>
@endpush
@section('backend_content')
    <div class="container">
        <a href="{{ route('dashboard.dashboard.messages') }}" class="back-link">← Back to Messages</a>

        <h1>Message Details</h1>

        <div class="info-row">
            <label>From:</label>
            <span>{{ $message->name }}</span>
        </div>

        <div class="info-row">
            <label>Email:</label>
            <span><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></span>
        </div>

        <div class="info-row">
            <label>Subject:</label>
            <span>{{ $message->subject ?? 'No Subject' }}</span>
        </div>

        <div class="info-row">
            <label>Date:</label>
            <span>{{ $message->created_at->format('F d, Y h:i A') }}</span>
        </div>

        <div class="message-content">
            <strong>Message:</strong><br><br>
            {{ $message->message }}
        </div>

        <form action="{{ route('dashboard.dashboard.messages.destroy', $message->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete this message?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">Delete Message</button>
        </form>
    </div>

@endsection
