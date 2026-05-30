@extends('backends.layout')
@push('backend_css')
    <style>
        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .badge {
            background: #dc3545;
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            background: #d4edda;
            color: #155724;
        }

        table {
            width: 100%;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .unread {
            font-weight: bold;
        }

        .read {
            opacity: 0.7;
        }

        .actions a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .delete-btn {
            color: #dc3545;
            background: none;
            border: none;
            cursor: pointer;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            gap: 5px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            background: white;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #007bff;
        }

        .pagination .active {
            background: #007bff;
            color: white;
        }
    </style>
@endpush
@section('backend_content')
    <div class="container">
        <h1>Contact Messages
            @if($unreadCount > 0)
                <span class="badge">{{ $unreadCount }} Unread</span>
            @endif
        </h1>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif
        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr class="{{ $message->is_read ? 'read' : 'unread' }}">
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject ?? 'No Subject' }}</td>
                            <td>{{ $message->created_at->format('M d, Y') }}</td>
                            <td>
                                @if($message->is_read)
                                    <span style="color: #28a745;">Read</span>
                                @else
                                    <span style="color: #dc3545;">Unread</span>
                                @endif
                            </td>
                            <td class="actions">
                                <a href="{{ route('dashboard.dashboard.messages.show', $message->id) }}">View</a>
                                <form action="{{ route('dashboard.dashboard.messages.destroy', $message->id) }}" method="POST"
                                    style="display: inline;" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center;">No messages yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $messages->links() }}
        </div>
    </div>
@endsection
